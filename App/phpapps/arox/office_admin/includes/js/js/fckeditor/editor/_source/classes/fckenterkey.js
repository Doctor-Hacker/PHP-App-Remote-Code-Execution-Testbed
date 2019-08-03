/*
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2008 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * Controls the [Enter] keystroke behavior in a document.
 */

/*
 *	Constructor.
 *		@targetDocument : the target document.
 *		@enterMode : the behavior for the <Enter> keystroke.
 *			May be "p", "div", "br". Default is "p".
 *		@shiftEnterMode : the behavior for the <Shift>+<Enter> keystroke.
 *			May be "p", "div", "br". Defaults to "br".
 */
var FCKEnterKey = function( targetWindow, enterMode, shiftEnterMode, tabSpaces )
{
	this.Window			= targetWindow ;
	this.EnterMode		= enterMode || 'p' ;
	this.ShiftEnterMode	= shiftEnterMode || 'br' ;

	// Setup the Keystroke Handler.
	var oKeystrokeHandler = new FCKKeystrokeHandler( false ) ;
	oKeystrokeHandler._EnterKey = this ;
	oKeystrokeHandler.OnKeystroke = FCKEnterKey_OnKeystroke ;

	oKeystrokeHandler.SetKeystrokes( [
		[ 13		, 'Enter' ],
		[ SHIFT + 13, 'ShiftEnter' ],
		[ 8			, 'Backspace' ],
		[ CTRL + 8	, 'CtrlBackspace' ],
		[ 46		, 'Delete' ]
	] ) ;

	this.TabText = '' ;

	// Safari by default inserts 4 spaces on TAB, while others make the editor
	// loose focus. So, we need to handle it here to not include those spaces.
	if ( tabSpaces > 0 || FCKBrowserInfo.IsSafari )
	{
		while ( tabSpaces-- )
			this.TabText += '\xa0' ;

		oKeystrokeHandler.SetKeystrokes( [ 9, 'Tab' ] );
	}

	oKeystrokeHandler.AttachToElement( targetWindow.document ) ;
}


function FCKEnterKey_OnKeystroke(  keyCombination, keystrokeValue )
{
	var oEnterKey = this._EnterKey ;

	try
	{
		switch ( keystrokeValue )
		{
			case 'Enter' :
				return oEnterKey.DoEnter() ;
				break ;
			case 'ShiftEnter' :
				return oEnterKey.DoShiftEnter() ;
				break ;
			case 'Backspace' :
				return oEnterKey.DoBackspace() ;
				break ;
			case 'Delete' :
				return oEnterKey.DoDelete() ;
				break ;
			case 'Tab' :
				return oEnterKey.DoTab() ;
				break ;
			case 'CtrlBackspace' :
				return oEnterKey.DoCtrlBackspace() ;
				break ;
		}
	}
	catch (e)
	{
		// If for any reason we are not able to handle it, go
		// ahead with the browser default behavior.
	}

	return false ;
}

/*
 * Executes the <Enter> key behavior.
 */
FCKEnterKey.prototype.DoEnter = function( mode, hasShift )
{
	// Save an undo snapshot before doing anything
	FCKUndo.SaveUndoStep() ;

	this._HasShift = ( hasShift === true ) ;

	var parentElement = FCKSelection.GetParentElement() ;
	var parentPath = new FCKElementPath( parentElement ) ;
	var sMode = mode || this.EnterMode ;

	if ( sMode == 'br' || parentPath.Block && parentPath.Block.tagName.toLowerCase() == 'pre' )
		return this._ExecuteEnterBr() ;
	else
		return this._ExecuteEnterBlock( sMode ) ;
}

/*
 * Executes the <Shift>+<Enter> key behavior.
 */
FCKEnterKey.prototype.DoShiftEnter = function()
{
	return this.DoEnter( this.ShiftEnterMode, true ) ;
}

/*
 * Executes the <Backspace> key behavior.
 */
FCKEnterKey.prototype.DoBackspace = function()
{
	var bCustom = false ;

	// Get the current selection.
	var oRange = new FCKDomRange( this.Window ) ;
	oRange.MoveToSelection() ;

	// Kludge for #247
	if ( FCKBrowserInfo.IsIE && this._CheckIsAllContentsIncluded( oRange, this.Window.document.body ) )
	{
		this._FixIESelectAllBug( oRange ) ;
		return true ;
	}

	var isCollapsed = oRange.CheckIsCollapsed() ;

	if ( !isCollapsed )
	{
		// Bug #327, Backspace with an img selection would activate the default action in IE.
		// Let's override that with our logic here.
		if ( FCKBrowserInfo.IsIE && this.Window.document.selection.type.toLowerCase() == "control" )
		{
			var controls = this.Window.document.selection.createRange() ;
			for ( var i = controls.length - 1 ; i >= 0 ; i-- )
			{
				var el = controls.item( i ) ;
				el.parentNode.removeChild( el ) ;
			}
			return true ;
		}

		return false ;
	}

	// On IE, it is better for us handle the deletion if the caret is preceeded
	// by a <br> (#1383).
	if ( FCKBrowserInfo.IsIE )
	{
		var previousElement = FCKDomTools.GetPreviousSourceElement( oRange.StartNode, true ) ;

		if ( previousElement && previousElement.nodeName.toLowerCase() == 'br' )
		{
			// Create a range that starts after the <br> and ends at the
			// current range position.
			var testRange = oRange.Clone() ;
			testRange.SetStart( previousElement, 4 ) ;

			// If that range is empty, we can proceed cleaning that <br> manually.
			if ( testRange.CheckIsEmpty() )
			{
				previousElement.parentNode.removeChild( previousElement ) ;
				return true ;
			}
		}
	}

	var oStartBlock = oRange.StartBlock ;
	var oEndBlock = oRange.EndBlock ;

	// The selection boundaries must be in the same "block limit" element
	if ( oRange.StartBlockLimit == oRange.EndBlockLimit && oStartBlock && oEndBlock )
	{
		if ( !isCollapsed )
		{
			var bEndOfBlock = oRange.CheckEndOfBlock() ;

			oRange.DeleteContents() ;

			if ( oStartBlock != oEndBlock )
			{
				oRange.SetStart(oEndBlock,1) ;
				oRange.SetEnd(oEndBlock,1) ;

//				if ( bEndOfBlock )
//					oEndBlock.parentNode.removeChild( oEndBlock ) ;
			}

			oRange.Select() ;

			bCustom = ( oStartBlock == oEndBlock ) ;
		}

		if ( oRange.CheckStartOfBlock() )
		{
			var oCurrentBlock = oRange.StartBlock ;

			var ePrevious = FCKDomTools.GetPreviousSourceElement( oCurrentBlock, true, [ 'BODY', oRange.StartBlockLimit.nodeName ], ['UL','OL'] ) ;

			bCustom = this._ExecuteBackspace( oRange, ePrevious, oCurrentBlock ) ;
		}
		else if ( FCKBrowserInfo.IsGeckoLike )
		{
			// Firefox and Opera (#1095) loose the selection when executing
			// CheckStartOfBlock, so we must reselect.
			oRange.Select() ;
		}
	}

	oRange.Release() ;
	return bCustom ;
}

FCKEnterKey.prototype.DoCtrlBackspace = function()
{
	FCKUndo.SaveUndoStep() ;
	var oRange = new FCKDomRange( this.Window ) ;
	oRange.MoveToSelection() ;
	if ( FCKBrowserInfo.IsIE && this._CheckIsAllContentsIncluded( oRange, this.Window.document.body ) )
	{
		this._FixIESelectAllBug( oRange ) ;
		return true ;
	}
	return false ;
}

FCKEnterKey.prototype._ExecuteBackspace = function( range, previous, currentBlock )
{
	var bCustom = false ;

	// We could be in a nested LI.
	if ( !previous && currentBlock && currentBlock.nodeName.IEquals( 'LI' ) && currentBlock.parentNode.parentNode.nodeName.IEquals( 'LI' ) )
	{
		this._OutdentWithSelection( currentBlock, range ) ;
		return true ;
	}

	if ( previous && previous.nodeName.IEquals( 'LI' ) )
	{
		var oNestedList = FCKDomTools.GetLastChild( previous, ['UL','OL'] ) ;

		while ( oNestedList )
		{
			previous = FCKDomTools.GetLastChild( oNestedList, 'LI' ) ;
			oNestedList = FCKDomTools.GetLastChild( previous, ['UL','OL'] ) ;
		}
	}

	if ( previous && currentBlock )
	{
		// If we are in a LI, and the previous block is not an LI, we must outdent it.
		if ( currentBlock.nodeName.IEquals( 'LI' ) && !previous.nodeName.IEquals( 'LI' ) )
		{
			this._OutdentWithSelection( currentBlock, range ) ;
			return true ;
		}

		// Take a reference to the parent for post processing cleanup.
		var oCurrentParent = currentBlock.parentNode ;

		var sPreviousName = previous.nodeName.toLowerCase() ;
		if ( FCKListsLib.EmptyElements[ sPreviousName ] != null || sPreviousName == 'table' )
		{
			FCKDomTools.RemoveNode( previous ) ;
			bCustom = true ;
		}
		else
		{
			// Remove the current block.
			FCKDomTools.RemoveNode( currentBlock ) ;

			// Remove any empty tag left by the block removal.
			while ( oCurrentParent.i
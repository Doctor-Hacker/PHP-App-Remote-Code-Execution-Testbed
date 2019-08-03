<?php
/* 
 * This software is released under the BSD 2-clause (simplified) license.
 * 
 * Copyright (c) 2014, J.Valentine (LunarCMS.com, jv@thevdm.com)
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer. 
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * The views and conclusions contained in the software and documentation are those
 * of the authors and should not be interpreted as representing official policies, 
 * either expressed or implied, of the FreeBSD Project.
 */

/* load the head.php file */
require('includes/head.php');
/* The admin home page */
?>
<strong>Welcome to your Lunar CMS administration panel</strong><br /><br />
<div style="margin:auto; text-align: center">
    <strong>Latest news from Twitter</strong><br>
    <!-- Show twitter feed for news -->
    <a class="twitter-timeline"  href="https://twitter.com/LunarCMS"  data-widget-id="464741178588422144">Tweets by @LunarCMS</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
<br>
<br>
<strong>Found an error</strong><br>
This software package has been created in my spare time around family life and other projects, you may therefor encounter the occasional coding error, browser/server incompatibility or spelling mistake. If you do happen to encounter an error it would be much appreciated if you could submit the details using the '<a href="bug_report.php">Bug Report form</a>'.<br><br>
<strong>Wish to contribute</strong><br>
If you have created a template, mod or addon that you would like to be featured in the downloads section on the Lunar CMS website then please feel free to add it to the <a href="http://lunarcms.com/browse_extensions" target="_blank">Extensions</a> or <a href="http://lunarcms.com/browse_templates" target="_blank">Templates</a> catalog. All submissions must adhere to an open source license along with being available for end users to download without charge. The Lunar CMS project is a non profit organization and is based on the contributions of time and code.<br><br>
<strong>Thank you for supporting the Lunar CMS project</strong>
<?php require('includes/foot.php'); ?>
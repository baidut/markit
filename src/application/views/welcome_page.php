<?php $this->load->view('includes/header'); ?>

<?php if(isset($tips)): ?>
  <div class="alert alert-dismissible alert-info">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php echo $tips ?>
  </div>
<?php endif ?>

<div class="splash">
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <!-- <div><img class="logo" src="assets/img/logo.png"></div> -->
        <h1>Free themes for Bootstrap</h1>
        <div id="social">
          <span>
            <iframe id="gh-fork" src="https://ghbtns.com/github-btn.html?user=thomaspark&repo=bootswatch&type=fork" allowtransparency="true" frameborder="0" scrolling="0" width="53" height="20"></iframe>
            <iframe id="gh-star" src="https://ghbtns.com/github-btn.html?user=thomaspark&repo=bootswatch&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>
          </span>
          <span style="display: inline-block; width: 210px;">
            <a href="https://twitter.com/bootswatch" class="twitter-follow-button" data-show-count="false" data-show-screen-name="true"></a>
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://bootswatch.com" data-via="bootswatch"></a>
          </span>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="sponsor">
              <a href="http://www.shopify.com/?ref=bootswatch" target="_blank" onclick="_gaq.push(['_trackEvent', 'banner', 'click', 'shopify']);">
                <img src="assets/img/shopify.png" alt="Shopify" width="180" height="150" onload="_gaq.push(['_trackEvent', 'banner', 'impression', 'shopify']);">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="section-tout">
  <div class="container">

    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <h3><i class="fa fa-file-o"></i> Easy to Use</h3>
        <p>Simply download a CSS file and replace the one in Bootstrap. No messing around with hex values.</p>
      </div>
      <div class="col-lg-4 col-sm-6">
        <h3><i class="fa fa-github"></i> Open Source</h3>
        <p>Bootstrap themes are released under the MIT License and maintained by the community on <a target="_blank" href="https://github.com/thomaspark/bootswatch">GitHub</a>.</p>
      </div>
      <div class="col-lg-4 col-sm-6">
        <h3><i class="fa fa-wrench"></i> Tuned for 3.3.6</h3>
        <p>Themes are built for the latest version of Bootstrap. <a href="2/">Version 2</a> and <a target="_blank" href="https://github.com/thomaspark/bootswatch/tags">others</a> are also available to download.</p>
      </div>
      <div class="col-lg-4 col-sm-6">
        <h3><i class="fa fa-cogs"></i> Modular</h3>
         <p>Changes are contained in just two LESS or SASS files, enabling modification and ensuring forward compatibility.</p>
      </div>
      <div class="col-lg-4 col-sm-6">
        <h3><i class="fa fa-cloud"></i> Get Plugged In</h3>
        <p>An <a href="./help/#api">API</a> is available for integrating with your platform. In use by <a href="https://nodebb.org/" target="_blank">NodeBB</a>, <a href="http://yabdab.com/stacks/bootsnap" target="_blank">BootSnap</a>, and others.</p>
      </div>
      <div class="col-lg-4 col-sm-6">
        <h3><i class="fa fa-bullhorn"></i> Stay Updated</h3>
        <p>Be notified about updates by subscribing via <a href="http://feeds.feedburner.com/bootswatch">RSS feed</a>, <a href="http://feedburner.google.com/fb/a/mailverify?uri=bootswatch&amp;loc=en_US">email</a>, or <a href="http://news.bootswatch.com" onclick="pageTracker._link(this.href); return false;">Tumblr</a>.</p>
      </div>
    </div>

  </div>
</div>


<?php $this->load->view('includes/footer'); ?>
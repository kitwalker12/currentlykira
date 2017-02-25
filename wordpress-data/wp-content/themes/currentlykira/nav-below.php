<!-- nav-below -->
<?php if (get_theme_mod('youtube_api_key') && get_theme_mod('youtube_channel')): ?>
<section class="row nav-below-single">
  <div class="column column-25 entry">
    <article class="entry-info">
      <h3 class="entry-hashtag">
        #CURRENTLYKIRA
      </h3>
      <h2 class="entry-title">
        <a href="#" title="" rel="bookmark">
          FEATURED
          <br/>
          VIDEO
        </a>
      </h2>
      <div class="entry-line">&nbsp;</div>
      <a href="/video" title="" class="entry-read-more">
        VIEW ALL VIDEOS
      </a>
    </article>
  </div>
  <div class="column column-75">
    <div id="featured-video"></div>
  </div>
</section>
<?php endif ?>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).ready(function() {
    $.ajax({
      url: "https://www.googleapis.com/youtube/v3/channels?part=contentDetails&id=<?php echo get_theme_mod('youtube_channel') ?>&key=<?php echo get_theme_mod('youtube_api_key') ?>"
    })
    .done(function(response) {
      $.each(response.items, function(index, item) {
        if (item.hasOwnProperty('contentDetails')) {
          var contentDetails = item.contentDetails;
          if (contentDetails.hasOwnProperty('relatedPlaylists')) {
            var relatedPlaylists = contentDetails.relatedPlaylists;
            if (relatedPlaylists.hasOwnProperty('uploads')) {
              var playlistID = relatedPlaylists.uploads;
              $.ajax({
                url: "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=" + playlistID + "&key=<?php echo get_theme_mod('youtube_api_key') ?>&maxResults=1"
              })
              .done(function(response) {
                var video_html = ""
                $.each(response.items, function(index, item) {
                  var videoTitle = item.snippet.title;
                  var videoId = item.snippet.resourceId.videoId;
                  var videoUrl = "https://www.youtube.com/watch?v=" + videoId;
                  video_html += "<a href='" + videoUrl + "' target='_blank' title='" + videoTitle + "'>" +
                      "<div class='img-container'>" +
                        "<iframe width='738' height='473' src='https://www.youtube.com/embed/" + videoId + "' frameborder='0' allowfullscreen></iframe>" +
                      "</div>" +
                    "</a>";
                  $('#featured-video').html(video_html);
                });
              })
              .fail(function(error) {
                console.log(error);
              })
              .always(function() {});
            }
          }
        }
      });
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {});
  });
  });
</script>
<!-- END nav-below -->

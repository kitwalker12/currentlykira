<!-- page video -->
<?php /* Template Name: Youtube Video Page */ ?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <header><?php edit_post_link(); ?></header>
<?php endwhile; endif; ?>

<?php if (get_theme_mod('youtube_api_key') && get_theme_mod('youtube_channel')): ?>
<div class="row">
  <div class="column">
    <h2 class="entry-latest-posts">
      ALL IN <span class="category-title">VIDEO</span>
    </h2>
  </div>
</div>
<?php endif ?>

<div id="videos"></div>

<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      url: "https://www.googleapis.com/youtube/v3/channels?part=contentDetails&id=<?php echo get_theme_mod('youtube_channel') ?>&key=<?php echo get_theme_mod('youtube_api_key') ?>"
    })
    .done(function(response) {
      $.each(response.items, function(index, item) {
        if (item.hasOwnProperty('id')) {
          var channelID = item.id;
          $.ajax({
            url: "https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&order=date&maxResults=48&channelId="+channelID+"&key=<?php echo get_theme_mod('youtube_api_key') ?>"
          })
          .done(function(response) {
            var count = response.items.length;
            var video_html = ""
            $.each(response.items, function(index, item) {
              if (index % 3 == 0) {
                video_html += "<div class='row'>";
              }
              var imageUrl = item.snippet.thumbnails.high.url;
              var videoTitle = item.snippet.title;
              var videoUrl = "https://www.youtube.com/watch?v=" + item.id.videoId;
              video_html += "<div class='column column-33'>" +
                "<article class='entry-3'>" +
                  "<a href='" + videoUrl + "' target='_blank' title='" + videoTitle + "'>" +
                    "<div class='img-container' style='background-image: url(" + imageUrl + ")'>" +
                    "</div>" +
                  "</a>" +
                  "<article class='entry-info'>" +
                    "<h2 class='entry-title'>" +
                      "<a href='" + videoUrl + "' target='_blank' rel='bookmark' title='" + videoTitle + "'>" +
                        videoTitle +
                      "</a>" +
                    "</h2>" +
                  "</article>" +
                "</article>" +
              "</div>";
              if ((index % 3 == 2) || (index + 1 == count)) {
                video_html += "</div>";
              }
              if (index + 1 == count) {
                $('#videos').html(video_html);
              }
            });
          })
          .fail(function(error) {
            console.log(error);
          })
          .always(function() {});
        }
      });
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {});
  });
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<!-- END page video -->

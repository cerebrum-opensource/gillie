@extends('layouts.frontend.app')
@section('head')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/gallery.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/js/Blueimp-jQuery-File-Upload/jquery.fileupload.css') }}" >
@endsection
@section('content')

<div ng-controller="albumsAndVideosCtrl" class="detail_box2">
    <div class="about_info">
        <h1>Photos / Videos </h1>
        <p><img alt="" src="{{ asset('frontend/images/black-drop.png') }}"></p>
    </div>
    <!--about_info-->
    <div class="bg bg_gallery">
        <div class="create_album">
            @if($profileHolderObj->getId() == Auth::Id()) <!-- check whether user is vieweing his own photos -->
                <button id="create_album" ng-click = "showCreateAlbumPopup()" class="create_album ca_btn">
                    <img src="{{asset('frontend/images/add.png')}}" alt="">
                    Create Album
                </button>

                <button ng-click = "showAddVideosPopup()" class="add_videos ca_btn">
                    <img src="{{asset('frontend/images/add.png')}}" alt="">
                    Video
                </button>
            @endif
        </div>
        <!--create_album-->

        <!-- Video Tile and Albums listing starts.-->
        <div class="gallery">

            <!--Video tile-->
            <div ng-cloak
                 id = "gallery_block_[[album.id]]"
                 ng-show = "videos_exists"
                 class = "gallery_block">
                <img class="play_icon" src="{{asset('frontend/images/play_icon.png')}}"/>

                <p>
                    <a href='{{url('videos/user-id/'.$profileHolderObj->getId())}}'>
                        <?php
                        $public_path = Config::get('constants.PUBLIC_PATH');
                        ?>
                        <img class="gallery_img" src="{{$public_path}}./image.php?width=149&height=109&cropratio=2:1.4&image=[[videos.last_thumb_path]]" alt="">
                    </a>
                    <span class="white_gallery_span"> </span>
                </p>
                <h5 title="Videos">Videos</h5>
                <!-- condition for "videos and video" text.-->
                <h6 ng-if="videos.count === 1">[[videos.count]] video </h6>
                <h6 ng-if="videos.count != 1">[[videos.count]] videos </h6>
            </div>
            <!-- video tile Ends-->

            <!-- Album tile -->
            <div id = "gallery_block_[[album.id]]"
                 ng-mouseLeave = "delete_btn = !delete_btn"
                 ng-mouseEnter = "delete_btn = !delete_btn"
                 ng-repeat = "album in albums| orderBy:'-id'"
                 ng-show = "albums_exists"
                 rel = "gallery_block"
                 class = "gallery_block"
                 ng-cloak
                 >
                @if($profileHolderObj->getId() == Auth::Id())
                <span ng-click="confirmAlbumDelete(album.id, album)"
                      ng-show="delete_btn" title="delete album"
                      class="delete_btn_span"
                      rel="[[album.id]]"
                      id="delete_album_[[album.id]]">
                    <img  src="{{asset('frontend/images/cross_icon.png')}}">
                </span>
                @endif
                <p>
                    <a href="{{url('album/id/[[album.id]]/user-id/'.$profileHolderObj->getId())}}">
                        <?php
                            $public_path = Config::get('constants.PUBLIC_PATH');
                        ?>
                        <img class="gallery_img" src="{{$public_path}}./image.php?width=149&height=109&cropratio=2:1.4&image=[[album.last_photo_path]]" alt="">
                    </a>
                    <span class="white_gallery_span"> </span></p>
                <h5 title="[[album.display_name]]">[[album.display_name|cut:false:15:' ...']]</h5>
                <h6>[[album.photo_count]] photo(s) </h6>
            </div>


            <!-- Album tile Ends-->

            <!-- No Album Exist Msg-->
            <div class="" ng-show="no_albums">
                <span class="no_records_available_large_font">No Albums to Display</span>
            </div>
            <!-- No Album Exist Msg End-->
        </div>
        <!-- Loading -->
        <span ng-show="loading_photos" class="loading_data loading_gallery">
                <img src="{{asset('frontend/images/processing.svg')}}" />
        </span>
        <!-- loading -->

        <!--gallery-->

        <!-- Add Album Popup -->
        <div id="add_album"
            class="gallery_popup glry_caret"
            ng-cloak
            style="display:none">
            <a ng-click="showCreateAlbumPopup()" href="javascript:;" class="popup_close_btn">X</a>
            <h2>Album Title</h2>
            <div class="add_photos">

              {{--  <button class="ca_btn">ADD PHOTOS</button>--}}
            <!-- Blueimp html starts -->
                <!-- The file upload form used as target for the file upload widget -->
                <div class = "multi-photo-upload">
                    <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
                        <!-- Redirect browsers with JavaScript disabled to the origin page -->
                        <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                        <div class="fileupload-buttonbar">
                            <div class="fileupload-buttons">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <input ng-model="album_name" maxlength="30" type="text" id="album_name" >
                            <span class="add_photos_span ca_btn fileinput-button">
                                <span>ADD PHOTOS</span>
                                <input type="file" name="files[]" multiple id = "add_photos"  title="Add Photos">
                            </span>
                                <!-- The global file processing state -->
                                <span class="fileupload-process"></span>
                            </div>
                            <!-- The global progress state -->
                            <div class="fileupload-progress fade" style="display:none">
                                <!-- The global progress bar -->
                                <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                <!-- The extended global progress state -->
                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>

                        <!-- The table listing the files available for upload/download -->
                        <div class="presentation-outer">
                            <table style="width:100%;" class="album_presentation" role="presentation"><tbody class="files"></tbody></table>
                        </div>
                    </form>
                </div>
                <!-- blueimp html ends -->
            </div>


            <div class="upload">
                <button ng-click="postAlbum();" id="post_photos" class="ca_btn">POST PHOTOS </button>
            </div>
            <!--upload-->

            <!-- The template to display files available for upload -->
            <script id="template-upload" type="text/x-tmpl">
            </script>
<?php
                    $public_path = Config::get('constants.PUBLIC_PATH')
?>
            <!-- The template to display files available for download -->
            <script id="template-download" type="text/x-tmpl">
                {% for (var i=0, file; file=o.files[i]; i++) { %}
                   {% if (file.thumbnailUrl) { %}
                    <div class="template-download fade template_thumb">
                    {% } else { %}
                    <div class="template-download fade">
                    {% } %}
                        <span class="preview">
                            {% if (file.thumbnailUrl) { %}
                                <a href="javascript:;" title="{%=file.name%}" data-gallery><img src="{%=file.imageResizeFilePathParams+file.thumbnailUrl%}"></a>
                            {% } else if (file.display_name){ %}

	 				            <label title="{%=file.display_name%}" class="attachment-lalbel">{%=file.display_name_trimmed%}</label>
					        {% } %}
                        </span>
                        {% if (file.error) { %}
                            <div style="width:160px">
                                <span class="error">
                                    Error
                                </span>
                                <p>
                                    {%=file.error%}
                                </p>
                               <button class="delete remove_thumb" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                    <img title = "remove video" src="<?php echo $public_path?>/frontend/images/cross_icon.png" alt="X" title="Remove"  width="10px" height="10px" />
                               </button>
                            </div>
                        {% } else { %}
                            <button class="delete remove_thumb thumbnail" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                <img title = "remove photo" src="<?php echo $public_path?>/frontend/images/cross_icon.png" alt="X" title="Remove"  width="10px" height="10px" />
                            </button>
                        {% } %}
                    </div>

                {% } %}
            </script>
        </div>
        <!-- Add Album Popup Ends -->


        <!-- Video gallery popup-->
        <div id="add_videos"
             class="gallery_popup glry_caret video_gallery"
             style="display:none">
            <a ng-click="showAddVideosPopup()" href="javascript:;" class="popup_close_btn">X</a>
            <div class="add_photos add_videos">
            {{--  <button class="ca_btn">ADD PHOTOS</button>--}}
            <!-- Blueimp html starts -->
                <!-- The file upload form used as target for the file upload widget -->
                <div class = "multi-photo-upload">
                    <form id="fileupload_videos" action="" method="POST" enctype="multipart/form-data">
                        <!-- Redirect browsers with JavaScript disabled to the origin page -->
                        <noscript>
                            <input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                        <div class="fileupload-buttonbar">
                            <div class="fileupload-buttons">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="fileinput-button ca_btn">
                                <span>ADD VIDEOS</span>
                                <input class="ca_btn" type="file" name="files[]" multiple id = "add_photos" title="Add videos">
                            </span>

                                <!-- The global file processing state -->
                                <span class="fileupload-process"></span>
                            </div>
                            <!-- The global progress state -->
                            <div class="fileupload-progress fade" style="display:none">
                                <!-- The global progress bar -->
                                <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                <!-- The extended global progress state -->
                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>

                        <!-- The table listing the files available for upload/download -->
                        <div class="presentation-outer">
                            <table style="width:100%;" class="video_presentation" role="presentation" rel="presentation_videos"><tbody class="files"></tbody></table>
                        </div>
                    </form>
                </div>
                <!-- blueimp html ends -->
            </div>


            <div class="upload">
                <button ng-click="postVideos();" id="post_videos" class="ca_btn">POST VIDEOS </button>
            </div>
            <!--upload-->

            <!-- The template to display files available for upload -->
            <script id="template-upload" type="text/x-tmpl">
            </script>
            <!-- The template to display files available for download -->
            <script id="template-download" type="text/x-tmpl">
                {% for (var i=0, file; file=o.files[i]; i++) { %}

                    <div class="template-download fade">
                        <span class="preview">

                                {%file.name%}
                                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>{%file.name%}</a>
                        </span>
                        {% if (file.error) { %}
                            <div><span class="error">Error</span> {%=file.error%}</div>
                        {% } %}
                           <button class="delete remove_thumb" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                           <img src="" alt="X" title="Remove"  width="10px" height="10px" /></button>
                    </div>

                {% } %}
            </script>
        </div>
        <!-- video gallery popup ENDS-->

    </div>
    <!-- bg -->
</div>
<div title="Delete Album" id="delete_album" style="display: none">
    <p>
        Are you sure you want to delete this Album?
    </p>
</div><!--title_popup-form-->
@endsection
@section('footer')
    <script  type="text/javascript" src="{{ asset('frontend/js/angular/controllers/profileController.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('frontend/js/gallery.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('frontend/js/angular/controllers/albumsAndVideoController.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('frontend/js/angular/directives/clickoutsideDirective.js') }}" ></script>
    {{--Start Blueimp jQuery-File-Upload includes--}}
    <script  type="text/javascript" src="{{ asset('frontend/js/Blueimp-jQuery-File-Upload/tmpl.min.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('frontend/js/Blueimp-jQuery-File-Upload/jquery.fileupload.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('frontend/js/Blueimp-jQuery-File-Upload/jquery.fileupload-process.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('frontend/js/Blueimp-jQuery-File-Upload/jquery.fileupload-validate.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('frontend/js/Blueimp-jQuery-File-Upload/jquery.fileupload-image.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('frontend/js/Blueimp-jQuery-File-Upload/jquery.fileupload-ui.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('frontend/js/Blueimp-jQuery-File-Upload/jquery.fileupload-jquery-ui.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('frontend/js/Blueimp-jQuery-File-Upload/main.js') }}" ></script>
    {{--End Blueimp jQuery-File-Upload includes--}}

@endsection

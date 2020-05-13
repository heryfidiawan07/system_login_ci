				
				<div id="overlay">
				    <div class="cv-spinner">
				        <span class="spinner"><span></span></span>
				    </div>
				</div>

				<div id="preloader">
				    <div class="cv-loader">
				        <span class="loader"><span></span></span>
				        <span class="ml-2">Loading ...</span>
				    </div>
				</div>
				
				<input type="hidden" id="base_url" value="<?= base_url(); ?>">

				<footer class="main-footer">
					<div class="footer-left">
						Copyright &copy; <?= date('Y'); ?> <div class="bullet"></div><a href="#">Hery Fidiawan</a>
					</div>
					<div class="footer-right"></div>
				</footer>
			</div>
		</div>
		<!-- General JS Scripts -->
		<!-- <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script> -->
		<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

		<!-- JS Libraies -->
		<!-- <?php if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "index_0") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "bootstrap_card") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "bootstrap_modal") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/prism/prism.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "layout_transparent") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/sticky-kit.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "components_gallery") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "components_multiple_upload") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/dropzonejs/min/dropzone.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "components_statistic") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "components_table") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "components_user") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "forms_advanced_form") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/cleave.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "forms_editor") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/codemirror/mode/javascript/javascript.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "gmaps_advanced_route" || $this->uri->segment(2) == "gmaps_draggable_marker" || $this->uri->segment(2) == "gmaps_geocoding" || $this->uri->segment(2) == "gmaps_geolocation" || $this->uri->segment(2) == "gmaps_marker" || $this->uri->segment(2) == "gmaps_multiple_marker" || $this->uri->segment(2) == "gmaps_route" || $this->uri->segment(2) == "gmaps_simple") { ?> -->
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyB55Np3_WsZwUQ9NS7DP-HnneleZLYZDNw&amp;sensor=true"></script>
		<script src="<?php echo base_url(); ?>assets/modules/gmaps.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_calendar") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/fullcalendar/fullcalendar.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_chartjs") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_datatables") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_owl_carousel") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_sparkline") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_sweet_alert") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_toastr") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/izitoast/js/iziToast.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_vector_map") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/izitoast/js/iziToast.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "auth_register") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "features_post_create") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "features_posts") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "features_profile") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "features_setting_detail") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/codemirror/mode/javascript/javascript.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "features_tickets") { ?> -->
		<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
		<script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "utilities_contact") { ?> -->
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyB55Np3_WsZwUQ9NS7DP-HnneleZLYZDNw&amp;sensor=true"></script>
		<script src="<?php echo base_url(); ?>assets/modules/gmaps.js"></script>
		<!-- <?php } ?> -->

		<!-- Page Specific JS File -->
		<!-- <?php if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/index.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "index_0") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/index-0.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "bootstrap_modal") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/bootstrap-modal.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "components_chat_box") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/components-chat-box.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "components_multiple_upload") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/components-multiple-upload.js"></script>
		<!-- <?php}elseif ($this->uri->segment(2) == "components_statistic") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/components-statistic.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "components_table") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/components-table.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "components_user") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/components-user.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "forms_advanced_form") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/forms-advanced-forms.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "gmaps_advanced_route") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/gmaps-advanced-route.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "gmaps_draggable_marker") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/gmaps-draggable-marker.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "gmaps_geocoding") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/gmaps-geocoding.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "gmaps_geolocation") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/gmaps-geolocation.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "gmaps_marker") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/gmaps-marker.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "gmaps_multiple_marker") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/gmaps-multiple-marker.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "gmaps_route") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/gmaps-route.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "gmaps_simple") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/gmaps-simple.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_calendar") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/modules-calendar.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_chartjs") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/modules-chartjs.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_datatables") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_ion_icons") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/modules-ion-icons.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_owl_carousel") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/modules-slider.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_sparkline") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/modules-sparkline.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_sweet_alert") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/modules-sweetalert.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_toastr") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/modules-toastr.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "modules_vector_map") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/modules-vector-map.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "auth_register") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/auth-register.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "features_post_create") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/features-post-create.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "features_posts") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/features-posts.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "features_setting_detail") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/features-setting-detail.js"></script>
		<!-- <?php }elseif ($this->uri->segment(2) == "utilities_contact") { ?> -->
		<script src="<?php echo base_url(); ?>assets/js/page/utilities-contact.js"></script>
		<!-- <?php } ?> -->

		<!-- Template JS File -->
		<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
		
		<!-- External -->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js'></script>

		<script>
			$(document).ready(function () {
		        // $('.js-example-basic-single').select2();
		        // $('.phone').inputmask("+6299999999999", {"placeholder": ""});
			});
			$('.swal2-styled').attr('autofocus',true);

			// INPUT TYPE TO UPPERCASE ======================
            $('.uppercase').keyup(function(){
                $(this).val($(this).val().toUpperCase());
            });
            // // INPUT TYPE TO LOWERCASE ======================
            $('.lowercase').keyup(function(){
                $(this).val($(this).val().toLowerCase());
            });
            // // INPUT NO SPACE ===============================
            $('.nospace').keypress(function(){
                $(this).val($(this).val().trim());
            });
            // ONLY YEAR =======================================
            $('.year').on('keypress keyup blur', function (event) {
               $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });
            // NUMBER ONLY =====================================
            $('.number').on('keypress keyup blur', function (event) {
               $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });

            // $('.plate_number').on('keypress', function (event) {
            //     var regex = new RegExp("^[a-zA-Z0-9]+$");
            //     var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            //     if (!regex.test(key)) {
            //        event.preventDefault();
            //        return false;
            //     }
            // });


			// $("#overlay").fadeIn(300);
			// $("#preloader").fadeIn(300);

			$(document).ready(function() {
				$("#preloader").fadeOut(300);
			});

			jQuery(function($){
			    // $(document).ajaxSend(function() {
			    //     $("#overlay").fadeIn(300);
			    // });

			    $(document).on({
				    ajaxStart: function() {
				    	$("#overlay").fadeIn(300);
				    },
				    ajaxStop: function() {
				    	$("#overlay").fadeOut(300);
				    }
				});
			        
			    $('form').submit(function(){
			        $.ajax({
			            type: 'POST',
			            success: function(data){
			                console.log(data);
			            }
			        }).done(function() {
			            setTimeout(function(){
			                $("#overlay").fadeOut(300);
			            },200);
			        });
			    }); 
			});

			// $(window).load(function() {
			//     $("#overlay").fadeOut(300);
			// });
    	</script>
	</body>
</html>
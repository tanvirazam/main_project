 
    </div>
        </div> 
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Content body end
        ***********************************-->
 <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2020</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/brim/dashboard_accet/vendor/global/global.min.js"></script>
	<script src="/brim/dashboard_accet/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/brim/dashboard_accet/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/brim/dashboard_accet/js/custom.min.js"></script>
	<script src="/brim/dashboard_accet/js/deznav-init.js"></script>
	<script src="/brim/dashboard_accet/vendor/owl-carousel/owl.carousel.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="/brim/dashboard_accet/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="/brim/dashboard_accet/vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="/brim/dashboard_accet/js/dashboard/dashboard-1.js"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},	
					1200:{
						items:2
					},			
					
					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
</body>
</html>
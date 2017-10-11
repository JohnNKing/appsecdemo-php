	</div>

	<!-- A8 Cross-Site Request Forgery (CSRF) -->
	<!-- TODO -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!--
		DEMO: Sub Resource Integrity
		cat inject.js | openssl dgst -sha384 -binary | openssl enc -base64 -A
		meMMogsa/Ud0HAR6rIUaKUOc5TRryJoEiVGz3oCNAtb3nB6HnAqYkEmcq5uUE9Q+
	-->
	<!-- <script src="https://tracker/inject.js"></script> -->
	<!-- <script src="https://tracker/inject.js" integrity="sha384-meMMogsa/Ud0HAR6rIUaKUOc5TRryJoEiVGz3oCNAtb3nB6HnAqYkEmcq5uUE9Q+" crossorigin="anonymous"></script> -->

	<!-- CORS Demo -->
	<script src="https://tracker/cors.js"></script>
</body>
</html>
	</div>

	<!-- A8 Cross-Site Request Forgery (CSRF) -->
	<!-- TODO -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!--
		DEMO: Sub Resource Integrity
		cat inject.js | openssl dgst -sha384 -binary | openssl enc -base64 -A
		qiAqDE+MLKE7t6Oa6EuOzT4TDmVWVo+pM1b1+BlE//hbThT8GQW7axdADF7jD401
	-->
	<!-- <script src="https://tracker/inject.js"></script> -->
	<!-- <script src="https://tracker/inject.js" integrity="sha384-qiAqDE+MLKE7t6Oa6EuOzT4TDmVWVo+pM1b1+BlE//hbThT8GQW7axdADF7jD401" crossorigin="anonymous"></script> -->

	<!-- CORS Demo -->
	<!-- <script src="https://tracker/cors.js"></script> -->
</body>
</html>
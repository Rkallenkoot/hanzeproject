<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{constant('BASE')}}/">Eat.it or Beat it!</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
				<li><a href="{{constant('BASE')}}"/>Home</a></li>
		</ul>
			<ul class="nav navbar-nav navbar-right">
				{% if not loggedIn %}
				<li><a href="{{constant('BASE')}}/auth"><i class="fa fa-user"></i> Registeren</a></li>
				<li><a href="{{constant('BASE')}}/auth"><i class="fa fa-sign-in"></i> Inloggen</a></li>
				{% else %}
				{% if voornaam %}
				<li><p class="navbar-text">Welkom {{voornaam|capitalize}}!</p></li>
				{% endif %}
				<li><a href="{{constant('BASE')}}/auth/logout"><i class="fa fa-sign-out"></i>Uitloggen</a></li>
				{% endif %}
			</ul>
		</div><!--/.navbar-collapse -->
	</div>
</nav>
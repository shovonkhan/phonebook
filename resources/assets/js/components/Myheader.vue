<template>
	<nav class="navbar" role="navigation" aria-label="main navigation">
	  <div class="navbar-brand">
	    <a class="navbar-item" href="">
	      <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
	    </a>

	    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
	      <span aria-hidden="true"></span>
	      <span aria-hidden="true"></span>
	      <span aria-hidden="true"></span>
	    </a>
	  </div>
	  <div class="navbar-menu is-active">
	    <!-- navbar start, navbar end -->
	    <router-link to="/home" class="navbar-item">Home</router-link>
    	<router-link to="/about" class="navbar-item">About</router-link>
	  </div>
	</nav>
</template>
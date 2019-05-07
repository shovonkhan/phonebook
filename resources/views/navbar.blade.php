<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">Office</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="#">Link <span class="sr-only">(current)</span></a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Company <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('company.index') }}">View List</a></li>
			            <li><a href="{{ route('company.create') }}">Add New</a></li>
			          </ul>
			        </li>
			        <li class="dropdown active">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bank <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('bank.index') }}">View List</a></li>
			            <li><a href="{{ route('bank.create') }}">Add New</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Branch <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('branch.index') }}">View List</a></li>
			            <li><a href="{{ route('branch.create') }}">Add New</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inventory <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('inventory.index') }}">View List</a></li>
			            <li><a href="{{ route('inventory.create') }}">Add New</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('category.index') }}">View List</a></li>
			            <li><a href="{{ route('category.create') }}">Add New</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('product-list.index') }}">View List</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PI <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('info') }}">Add PI</a></li>
			            <li><a href="{{ route('info_list') }}">View PI</a></li>
			          </ul>
			        </li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="#">Link</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			          </ul>
			        </li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
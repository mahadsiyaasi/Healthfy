<?php 
use App\Http\Controllers\companyController; 
$parent_li = companyController::listside()->parents;
$child_li = companyController::listside()->child;
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset(companyController::company()->logo)}}"  class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ companyController::company()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> welcome</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          @foreach($parent_li as $val)
          @if($val->parent_id==0)       
        <li class="treeview">
          <a href="#">
            <i class="{{$val->icon}}"></i> <span>{{$val->name}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           @foreach($child_li as $vals)
          @if($val->id==$vals->parent_id)
          @if($vals->id==21)
          <li id="{{$vals->id}}"> <a  href="{{$vals->url}}"><i class="fa fa-circle-o"></i>{{$vals->name}}</a></li>
           @elseif($vals->url!=null)
            <li id="{{$vals->id}}"><a href="{{$vals->url}}"> <i class="fa fa-circle-o"></i> <?php echo htmlspecialchars_decode($vals->event, ENT_QUOTES); ?> {{$vals->name}}</a></li>
             @else
          <li id="{{$vals->id}}"><a <?php echo htmlspecialchars_decode($vals->event, ENT_QUOTES); ?> > <i class="fa fa-circle-o"></i> {{$vals->name}}</a>
          </li>
          @endif
          @endif
            @endforeach
            </ul>
        </li>
        @endif
        @endforeach
      </ul>
    <!-- /.sidebar -->
  </aside>
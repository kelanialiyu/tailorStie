
<div class="col-sm-6">
           
           <ol class="breadcrumb float-sm-right">
             @foreach($breadcrumbs as $name => $link)
               @if($loop->last)
               <li class="breadcrumb-item active">{{ucfirst($name)}}</li>
               @else
                <li class="breadcrumb-item"><a href="{{$link}}">{{ucfirst($name)}}</a></li>
               @endif              
               
             @endforeach
             
           </ol>
</div><!-- /.col -->

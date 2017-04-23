<div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 " style="background:#E31D7E">
                    	<b style="text-align:center">Category list</b>
                    </li>
                 	@foreach($cate as $c)
                        <li class="list-group-item menu1" style="background:#E31D7E;font-weight: bold"><a style="cursor: pointer" href="category/{{$c->id}}/{{$c->cate_name}}.html">{{$c->cate_name}}</a>
                        </li>
                  	@endforeach
                   
                </ul>
            </div>
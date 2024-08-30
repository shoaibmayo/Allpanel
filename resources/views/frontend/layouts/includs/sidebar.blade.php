 <!--Sidebar start-->
 <div class="offcanvas offcanvas-start sidebar-nav " tabindex="-1" id="offcanvasExample"
     aria-labelledby="offcanvasExampleLabel" style="background-color: #bbb;">
     <div class="offcanvas-header p-0">
         <button type="button" class="btn-close mt-1 " style="margin-right: 5px" data-bs-dismiss="offcanvas"
             aria-label="Close"></button>
     </div>
     <div class="offcanvas-body p-0">
         <div class="">
             <ul class="navbar-nav mb-5">
                 <li>
                     <div class="text-muted small fw-bold text-uppercase mt-3 mb-2 px-3">Interface</div>
                 </li>
                 @if (getCategory()->isNotEmpty())
                     @foreach (getCategory() as $category)
                         <li>
                             <a class="nav-link px-2 mt-1 sidebar-link" style="background-color:#2d3387;"
                                 data-bs-toggle="collapse" href="#collapseCategory{{ $category->id }}" role="button"
                                 aria-expanded="false" aria-controls="collapseCategory{{ $category->id }}">
                                 <span class="text-white">{{ $category->name }}</span>
                                 <span class="ms-auto">
                                     <span class="right-icon">
                                         <i class="bi bi-chevron-down"></i>
                                     </span>
                                 </span>
                             </a>
                             @if ($category->subcategories->isNotEmpty())
                                 <div class="collapse {{ ( $categorySelected == $category->id) ? 'show' : '' }} "
                                     id="collapseCategory{{ $category->id }}">
                                     @foreach ($category->subcategories as $subcategory)
                                         <ul class="navbar-nav mt-1 px-3">
                                             <li>
                                                 @if ($subcategory->childcategories->isNotEmpty())
                                                     <a class="nav-link px-1 mt-1 sidebar-link {{ ($subcategorySelected == $subcategory->id) ? 'show' : '' }} "
                                                         style="background-color:#2d3387;" data-bs-toggle="collapse"
                                                         href="#collapseSubcategory{{ $subcategory->id }}"
                                                         role="button" aria-expanded="false"
                                                         aria-controls="collapseSubcategory{{ $subcategory->id }}">
                                                         <span class="text-white">{{ $subcategory->name }}</span>
                                                         <span class="ms-auto">
                                                             <span class="right-icon">
                                                                 <i class="bi bi-chevron-down"></i>
                                                             </span>
                                                         </span>
                                                     </a>
                                                 @else
                                                     <a class="nav-link  fw-bold {{ ($subcategorySelected == $subcategory->id) ? 'text-primary' : '' }}"
                                                         href="{{ route('front.gameDetails', [$category->slug, $subcategory->slug]) }}">
                                                         <i class="bi bi-arrow-right-short"></i>
                                                         <span class=""
                                                             style="font-size: 12px">{{ $subcategory->name }}</span>
                                                     </a>
                                                 @endif
                                                 <div class="collapse {{ ($subcategorySelected == $subcategory->id) ? 'show' : '' }}"
                                                     id="collapseSubcategory{{ $subcategory->id }}">
                                                     @if ($subcategory->childcategories->isNotEmpty())
                                                         @foreach ($subcategory->childcategories as $childcategory)
                                                             <ul class="navbar-nav mt-1 ">
                                                                 <li>
                                                                     <a class="nav-link  fw-bold {{ ($childcategorySelected == $childcategory->id) ? 'text-primary' : '' }} "
                                                                         href="{{ route('front.gameDetails', [$category->slug, $subcategory->slug, $childcategory->slug]) }}">
                                                                         <i class="bi bi-arrow-right-short"></i>
                                                                         <span class=""
                                                                             style="font-size: 12px">{{ $childcategory->name }}</span>
                                                                     </a>
                                                                 </li>
                                                             </ul>
                                                         @endforeach
                                                     @endif
                                                 </div>
                                             </li>
                                         </ul>
                                     @endforeach

                                 </div>
                             @endif
                         </li>
                     @endforeach
                 @endif

             </ul>
         </div>
     </div>
 </div>
 <!--Sidebar end-->

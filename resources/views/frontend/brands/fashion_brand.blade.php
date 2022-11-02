@extends('frontend.main_master')

@include('frontend.body.fash_fontend_sidber')

<style>

    .all-brand-inner{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-wrap: wrap;
    }

    .all-brand-info{
        width: 330px;
        margin: 15px;
    }


    .all-brand-info h5{
        text-transform: capitalize;
        
        font-size: 1.5rem;
        color: #454545;
    }
</style>

@section('islamic')

    <div class="custom-header d-flex align-items-center custom-header-islamic custom-header-ecom-title">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="category-contain">
                        <!-- ---------- Category Sidebar and Logo ------------- -->
                        <div class="category-left">
                            <div class="header-category">
                                <div class="category-btn-logo-container">
                                    <a id="category-toggle-custom-sidemenu-button" onclick="toggleCategorySidemenu()"
                                        class="category-toggle-btn"><i class="fa fa-bars"></i></a>
                                    </a>
                                    <a href="{{ url('/fashion') }}" class="logo-container custom-header-ecom-title-home">
                                        <i class="fas fa-home"></i> Fashion Home
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- ---------- Search with Category ------------- -->
                        <div>
                            <a href="{{ url('/fashion') }}" class="logo-container custom-header-ecom-title-home">
                              <h2 class="text-white">Fashion</h2>
                           </a>
                          
                        </div>
                        <!-- ---------- Category Right Buttons ------------- -->
                        <div id="icon-block" class="icon-block">
                        </div>
                        <div class="icon-block-mobile">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <main class="main-body">
      
  
  
        <section class="main-content category-closed" id="main-content">
           <div class="container-fluid profile px-md-5 px-3 mt-3">
              <!-- Alphabetn list starts -->
              <div class="conatiner text-center p-5">
                 <h3>All Brand</h3>
              </div>
              <div class="breadcrumb container">
                 <ul>
                    <li>Home<i class="fas fa-angle-right"></i></li>
                    <li>All Brands</li>
                 </ul>
              </div>
              <section id="alphabert-list">
                 <div class="al row">
                    <div class="alphabet-List-Items col-lg-9 col-md-6">
                       <ul>
                           @foreach ($brands as $key=>$brand)
                            <li>
                                <a href="#{{$key}}">{{strtoupper($key)}}</a>
                            </li>
                               
                           @endforeach
                          
                       </ul>
                    </div>
                    <div class="question col-lg-3 col-md-6">
                       <div class="search-container">
                          <input type="text" placeholder="Search Brand And Store">
                          <button class="btn text-muted"><i class="fas fa-search"></i></button>
                          
                       </div>
                    </div>
                    <div class="allBrand mt-5 col-12">
                       <a href="#">All Brand</a>
                       <a href="#" class="bg-yellow">Discount Offer</a>
                    </div>
              </section>
              <!-- Alphabet list ends -->
              <!-- brand part starts -->
              <section id="brand-part" class="  mt-5">
                 <div class="container-fluid">
                     @foreach ($brands as $key=>$brand)
                         
                        <div class="grid-container mb-5" id="{{$key}}">
                            <div class="alphabet">
                            <h3>{{strtoupper($key)}}</h3>
                            </div>
    
                            <div class="brand-table">
                            <div class="brandTable-detail">
                                
                                {{-- end row  --}}

                                <div class="all-brand-wrapper">
                                    <div class="all-brand-inner">
                                        @foreach ($brand as $item)
                                            <div class="all-brand-info">
                                                <h5>{{$item->brand_name_cats_eye}}</h5>
                                            </div>
                                            
                                        @endforeach

                                        
                                    </div>

                                </div>

                            </div>
                            </div>
    
                        </div>
                        
                     @endforeach
                    
                 </div>
  
              </section>
              <!-- brand Part Ends -->
           </div>
  
         
  
        </section>

     </main>




@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
        integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@endsection

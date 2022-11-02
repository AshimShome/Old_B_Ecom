<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\GroceryController;
use App\Http\Controllers\Frontend\BabyController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ElectronicController;
use App\Http\Controllers\Frontend\IslamicController;
use App\Http\Controllers\Frontend\CosmeticController;
use App\Http\Controllers\Frontend\FurnitureController;
use App\Http\Controllers\Frontend\FashionController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\InformationController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\PageCartController;
use App\Http\Controllers\User\ImageController;




// ################################################## Start For IndexController  ##################################################



// all product detail route start
Route::get('/product/detail_fur/{cat_slug}/{subcat_slug}/{slug}', [IndexController::class, 'ProductFurDetails'])->name('ProductFurDetails');
Route::get('/product/detail/{cat_slug}/{subcat_slug}/{slug}', [IndexController::class, 'ProductDetails'])->name('ProductDetails_islamic');
Route::get('/product/detail/baby/{cat_slug}/{subcat_slug}/{slug}', [IndexController::class, 'ProductDetailsBaby'])->name('ProductDetailsBaby');
Route::get('/product/detail/fashion/{cat_slug}/{subcat_slug}/{slug}', [IndexController::class, 'ProductDetailsFashion'])->name('ProductDetailsFashion');
// all product detail route end

// for baby
Route::get('/product/view/modal/baby/{id}', [IndexController::class, 'BabyProductViewAjax']);
// for fashion
Route::get('/product/view/fashionmodal/{id}', [IndexController::class, 'FashionProductViewAjax']);
// Frontend tags page route
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
// Frontend SubCategory wise Data
Route::get('/subcategory/product/{subcat_id}', [IndexController::class, 'SubCatWiseProduct']);
// Frontend Sub  SubCategory wise Data
Route::get('/subsubcategory/product/{subsubcat_id}', [IndexController::class, 'SubSubCatWiseProduct']);
// Product view model ajax card
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
// Fur new route
Route::get('/productFu/view/modal/{id}', [IndexController::class, 'ProductViewFur']);

/// Product Search Route
Route::get('product/search', [IndexController::class, 'ProductSearch'])->name('product.search');
Route::get('product/searchColor/{color}', [IndexController::class, 'searchByColor'])->name('product.searchColor');
Route::get('product/searchCategory/{category}', [IndexController::class, 'searchByCategory'])->name('product.searchCategory');
Route::get('product/Category/{category}', [IndexController::class, 'categoryByProduct'])->name('product.categoryProduct');
Route::get('product/searchSubSubCategory/{category}', [IndexController::class, 'searchBySubSubCategory'])->name('product.searchSubSubCategory');
Route::get('product/latestProduct', [IndexController::class, 'latestProduct'])->name('product.latestProduct');
Route::get('product/popularProduct', [IndexController::class, 'GroceryPopularProduct'])->name('product.populartProduct');
Route::get('product/islamicpopularProduct', [IndexController::class, 'IslamicPopularProduct'])->name('islamicproduct.populartProduct');
Route::get('product/dalyProduct', [IndexController::class, 'GroceryDalyPopularProduct'])->name('product.dalytProduct');
Route::get('product/fashion/dalyProduct', [IndexController::class, 'FashionDalyPopularProduct'])->name('fashionproduct.dalytProduct');
Route::get('product/fashion/BestProduct', [IndexController::class, 'FashionBestPopularProduct'])->name('fashionproduct.BestProduct');
Route::get('product/dalyProductislamic', [IndexController::class, 'IslamicDalyPopularProduct'])->name('product.islamicdalytProduct');
Route::get('product/latestProduct', [IndexController::class, 'GroceryLatestPopularProduct'])->name('product.latestProduct');
Route::get('product/AllProduct', [IndexController::class, 'allProduct'])->name('product.allProduct');
Route::get('product/baby/featur/Product', [IndexController::class, 'BabyFeaturProduct'])->name('babyfeturproduct.Product');
Route::get('product/baby/best/seling/Product', [IndexController::class, 'BabyBestsSellingProduct'])->name('babybestproduct.Product');
Route::get('product/baby/top/seling/Product', [IndexController::class, 'BabyTopSellingProduct'])->name('babytopproduct.Product');
Route::get('product/baby/best/deal/Product', [IndexController::class, 'BabyTopBestDealProduct'])->name('babydealproduct.Product');

Route::get('product/fashion/category/Product', [IndexController::class, 'AllFashionCategoryProduct'])->name('fashionproduct.allProduct');
Route::get('product/cosmetic/category/Product', [IndexController::class, 'AllCosmeticCategoryProduct'])->name('Casmeticproduct.allProduct');

Route::get('product/fashion/brand/AllProduct', [IndexController::class, 'AllFashionBrandProduct'])->name('product.allProduct');
Route::get('porduct/fashion/brand/{id}', [FashionController::class, 'brandWiseProduct'])->name('fashion.product.brandWiseProduct');
Route::get('porduct/fashion/category', [FashionController::class, 'CategoryWiseProduct'])->name('fashion.product.categoryWiseProduct');
Route::get('electronic/all/category', [ElectronicController::class, 'AllCategoryElectronic'])->name('electronic.all.category');

Route::get('product/PopularProduct', [IndexController::class, 'popularProduct'])->name('product.popularProduct');
Route::get('product/SpecialOfferProduct', [IndexController::class, 'specialOffer'])->name('product.specialOffer');
Route::get('product/SpecialDealProduct', [IndexController::class, 'specialDeal'])->name('product.specialDeal');
Route::get('cosmetic/category/page', [IndexController::class, 'CosmeticCategoryPage'])->name('cosmetic_category.page');

//Review route start
Route::post('/product/review/{id}', [IndexController::class, 'review'])->name('product.review');
//Review Search end
//subscribe route start
Route::post('/subscribe', [IndexController::class, 'subscribe'])->name('subscribe');

// Admin All Department Route Group
Route::get('/getSubCategory/{id}', [IndexController::class, 'getSubCategoryForSidebar']);
Route::get('/getSubSubCategory/{id}', [IndexController::class, 'getSubSubCategoryForSidebar']);
Route::get('/SubSubCategory/{id}', [IndexController::class, 'getSubSubSubCategoryForSidebar']);

Route::get('/get/productSortislamic/{sub_category_id}', [IndexController::class, 'GetProductsSortIslamic']);
Route::get('/get/subproductSort/{sub_category_id}', [IndexController::class, 'GetProductsSort2']);
Route::get('/get/subproductSort/grocery/{sub_category_id}', [IndexController::class, 'GrocerygetGetProductsSort2']);
Route::post('/post/filteredProduct/', [IndexController::class, 'GetFilteredProducts']);

Route::post('/post/filteredProduct/getproduct/', [IndexController::class, 'ProductGetFilteredProducts']);

Route::post('/post/filteredProductgetpage/', [IndexController::class, 'GetFilteredProductsGetpage']);
Route::get('/all_category', [IndexController::class, 'test'])->name('all_category.view');

Route::get('/getSubCategory/{id}', [IndexController::class, 'getSubCategoryForSidebar'])->name('get.subcat');
Route::get('/getSubSubCategory/{id}', [IndexController::class, 'getSubSubCategoryForSidebar'])->name('get.subsubcat');
Route::get('/SubSubCategory/{id}', [IndexController::class, 'getSubSubSubCategoryForSidebar']);

Route::get('/IslamicController', [IndexController::class, 'LatestDiscountedProducts'])->name('latestdiscountedproducts.view');

Route::get('/special/grocery/offer', [IndexController::class, 'GroceryOffer'])->name('grocery_specialoffer.view');

// Islamic Available Coupon offer
Route::get('/coupon/offer', [IndexController::class, 'Coupon'])->name('coupon.view');
// ===================================== Offer End All Route  List ===========================================
// filtering category
Route::get('get_causes_against_category/{id}', [IndexController::class, 'get_causes_against_category']);
// filtering sub category
Route::get('get_causes_against_subcategory/{id}', [IndexController::class, 'get_causes_against_subcategory']);
// filtering sub sub category
Route::get('get_causes_against_subsubcategory/{id}', [IndexController::class, 'get_causes_against_subsubcategory']);
// filtering category sort
Route::get('get_causes_against_categorysort', [IndexController::class, 'get_causes_against_categorysort']);
// filtering category sort
Route::get('get_causes_against_subcategorysort/{id}', [IndexController::class, 'get_causes_against_subcategorysort']);
Route::get('get_causes_against_subsubcategorysort/{id}', [IndexController::class, 'get_causes_against_subsubcategorysort']);
Route::get('/404', [IndexController::class, 'ErrorPage'])->name('get.error');
Route::get('/', [IndexController::class, 'landing'])->name('user.index');
Route::post('/contact-us/send', [IndexController::class, 'contactUs'])->name('contactUs.send');
Route::get('/create/registration', [IndexController::class, 'createAccount'])->name('user.register'); //name('user.index')
// User Logout Route
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
// User Update Profile
Route::get('/user/profile/update', [IndexController::class, 'UserProfile'])->name('user.profile');
// user profile store
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
// user Change Password
Route::get('/user/change/password', [IndexController::class, 'UserChnagePassword'])->name('change.password');
// user  Password Update
Route::get('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/sendMessage', [UserController::class, 'sendSms']);
Route::get('/supplier/all', [IndexController::class, 'SupplierDataShowAll']);
Route::get('/product/ajax/suggest/search', [IndexController::class, 'searchProductByAjax'])->name('searchproduct.ajax');
Route::get('/search', [IndexController::class, 'searchByProductNameView'])->name('searchproduct.view');

// Sidebar Search Route Start
Route::prefix('bs')->group(function () {
    Route::get('/category_view', [IndexController::class, 'CategoryView'])->name('category.view');
    Route::get('/grocerycategory_view', [GroceryController::class, 'GroceryCategoryView'])->name('grocerycategory.view');
    Route::get('/{cat_slug}', [IndexController::class, 'SubCategoryView'])->name('subcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}', [GroceryController::class, 'SubSubCategoryView12'])->name('subsubcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}/{subsubcat_slug}', [IndexController::class, 'GetProductView1'])->name('getproduct.view');
});




// ################################################## End For IndexController  ##################################################


// ################################################## Start For IslamicController  ##################################################
// Islamic Website
Route::get('/islamic', [IslamicController::class, 'landing'])->name('islamic');
Route::get('/get/productSortislamic/getproduct/{sub_category_id}', [IslamicController::class, 'FarukIslamicGetProductsSortIslamic']);
Route::post('/post/filteredProductgetpage/islamicgetproduct/', [IslamicController::class, 'IslamicGetproductGetFilteredProductsGetpage']);
Route::post('/post/filteredProduct2/islamic/', [IslamicController::class, 'IslamicGetFilteredProducts2']);
// Islamic  Special Offer
Route::get('/special/offer', [IslamicController::class, 'Offer'])->name('specialoffer.view');

// ################################################## End For IslamicController  ##################################################

// ################################################## Start For GroceryController  ##################################################
// Sidebar Search Route Start

Route::post('/post/filteredProduct2/grocery/', [GroceryController::class, 'GroceryGetFilteredProducts2']);
Route::get('/latestdiscountedproductsgrocery', [GroceryController::class, 'GroceryLatestDiscountedProducts'])->name('latestdiscountedproducts.view');
Route::get('/grocery/latest/discount/products', [GroceryController::class, 'Grocery_LDP'])->name('grocery_ldp.view');
Route::get('/grocery', [GroceryController::class, 'landing'])->name('grocery.index');

Route::prefix('gbs')->group(function () {
    Route::get('/grocery_category_view', [GroceryController::class, 'GroceryCategoryView'])->name('grocery_category_view.view');
    Route::get('/{cat_slug}', [GroceryController::class, 'GrocerySubCategoryView'])->name('subcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}', [GroceryController::class, 'GrocerySubSubCategoryView12'])->name('subsubcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}/{subsubcat_slug}', [GroceryController::class, 'GroceryGetProductView1'])->name('getproduct.view');
});
// ################################################## End For GroceryController  ##################################################

// ################################################## Start For ElectronicController  ##################################################
Route::get('/electronic', [ElectronicController::class, 'landing'])->name('electronic.index');

Route::prefix('ebs')->group(function () {
    Route::get('/grocerycategory_view', [ElectronicController::class, 'ECategoryView'])->name('grocerycategory.view');
    Route::get('/{cat_slug}', [ElectronicController::class, 'ESubCategoryView'])->name('subcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}', [ElectronicController::class, 'ESubSubCategoryView12'])->name('subsubcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}/{subsubcat_slug}', [ElectronicController::class, 'EGetProductView1'])->name('getproduct.view');
});
Route::get('/electronic/product/detail/{cat_slug}/{subcat_slug}/{slug}', [ElectronicController::class, 'electronicProductDetails'])->name('electronicProductDetails');
// electronic  Special Offer
Route::get('/special/electronic/offer', [ElectronicController::class, 'ElectronicOffer'])->name('electronicspecialoffer.view');
// ################################################## End For ElectronicController  ##################################################

// ################################################## Start For FashionController  ##################################################
Route::get('/fashion', [FashionController::class, 'landing'])->name('fashion.index');
Route::get('/fashions/brands', [FashionController::class, 'brands'])->name('fashion.brands');
Route::get('/fashions/{cat_slug}/{sub_cat_slug}', [FashionController::class, 'subcategoryProducts'])->name('fashion.subCategory.product');
Route::get('/fashions/specialOffer', [FashionController::class, 'specialOffer'])->name('fashion.specialOffer');
// Fashion Special Offer
Route::get('/special/fashion/offer', [FashionController::class, 'FashionOffer'])->name('fashion_specialoffer.view');
Route::get('/get/productSortislamic/fashion/{sub_category_id}', [FashionController::class, 'FashionfarukGetProductsSortIslamic']);
Route::get('/get/subproductSort/fashion/sub/{sub_category_id}', [FashionController::class, 'FshionSubGetProductsSort2']);
Route::post('/post/filteredProduct/fashion/', [FashionController::class, 'FashionGetGetFilteredProducts']);
Route::post('/post/filteredProductgetpage/fashion/faruk/', [FashionController::class, 'FashionfarukGetFilteredProductsGetpage']);
Route::post('/post/filteredProduct2/fashion/', [FashionController::class, 'FashionGetFilteredProducts2']);
// Fashion Sidebar Search Route Start
Route::prefix('fabs')->group(function () {
    Route::get('/grocerycategory_view', [FashionController::class, 'FashCategoryView'])->name('fashion_category.view');
    Route::get('/{cat_slug}', [FashionController::class, 'FashSubCategoryView'])->name('subcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}', [FashionController::class, 'FashSubSubCategoryView12'])->name('subsubcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}/{subsubcat_slug}', [FashionController::class, 'FashGetProductView1'])->name('getproduct.view');
});
// ################################################## End For FashionController  ##################################################
// ################################################## Start For BabyController  ##################################################
Route::get('/special/baby/offer', [BabyController::class, 'BabyOffer_last'])->name('baby_specialoffer.view');
// ==================================> baby All Route Group Start<===========================
Route::get('/baby', [BabyController::class, 'landing'])->name('baby.index');
// Admin All Sub SUb Category Route Group
Route::prefix('subsubcategory')->name('subsubcategory.')->group(function () {
    Route::get('/view', [BabyController::class, 'SubSubCategoryView'])->name('view');
    // sub sub category route
    Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);
    // sub category route
    Route::get('/subcategory/{category_id}', [SubSubCategoryController::class, 'getOnlySubCategory']);
    // sub category route
    Route::get('/subsubcategory/{subcategory}', [SubSubCategoryController::class, 'getOnlySubSubCategory']);
    // for auto select sub sub category route
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);
    //Sub  Sub category store
    Route::post('/store', [SubSubCategoryController::class, 'store'])->name('store');
    Route::get('/fetchall', [SubSubCategoryController::class, 'fetchAll'])->name('fetchAll');
    Route::get('/delete/{id}', [SubSubCategoryController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [SubSubCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [SubSubCategoryController::class, 'update'])->name('update');

    Route::post('/active-deactive-subsubcategory/{id}', [SubSubCategoryController::class, 'activeDeactiveSubSubCategory'])->name('subSubCategoryActiveDeactive');
});
// Sidebar Search Route Start
Route::prefix('bbs')->group(function () {
    Route::get('/babycategory_view', [BabyController::class, 'BCategoryView'])->name('babycategory.view');
    // Route::get('/{cat_slug}', [IndexController::class, 'BSubCategoryView'])->name('baby_subcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}', [BabyController::class, 'BSubSubCategoryView12'])->name('baby_subsubcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}/{subsubcat_slug}', [BabyController::class, 'BGetProductView1'])->name('baby_getproduct.view');
});
// ################################################## End For BabyController  ##################################################
// ################################################## Start For FurnitureController  ##################################################
Route::get('/special/furniture/offer', [FurnitureController::class, 'FurnitureOffer'])->name('furniture_specialoffer.view');
// furniture Special Offer
Route::get('/product/furniture/more', [FurnitureController::class, 'FurnitureProductMore'])->name('furniture_product_more.view');
// Sidebar Search Route Start
Route::prefix('fbs')->group(function () {
    Route::get('/grocerycategory_view', [FurnitureController::class, 'FurCategoryView'])->name('furniture_category.view');
    Route::get('/{cat_slug}', [FurnitureController::class, 'FurSubCategoryView'])->name('subcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}', [FurnitureController::class, 'FurSubSubCategoryView12'])->name('subsubcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}/{subsubcat_slug}', [FurnitureController::class, 'FurGetProductView1'])->name('getproduct.view');
});
Route::get('/furniture', [FurnitureController::class, 'landing'])->name('furniture.index');

// ################################################## End For FurnitureController  ##################################################
// ################################################## Start For CosmeticController  ##################################################
Route::get('/special/cosmetics/offer', [CosmeticController::class, 'CosmeticsOffer_last'])->name('cosmetics_specialoffer.view');
Route::get('/special/cosmetics/popular/product', [CosmeticController::class, 'CosmeticsPopularProduct'])->name('cosmetics_popular_product.view');
Route::get('/special/cosmetics/feature/product', [CosmeticController::class, 'CosmeticsFeatureProduct'])->name('cosmetics_feature_product.view');
Route::get('/cosmetic', [CosmeticController::class, 'landing'])->name('cosmetic.index');
Route::get('/cosmetic/product/detail/{cat_slug}/{subcat_slug}/{slug}', [CosmeticController::class, 'CosmatictProductView'])->name('cosmeticproduct_view.index');
Route::get('/cosmetic-brandwise-product/{id}', [CosmeticController::class, 'CosmatictBrandWiseProductView'])->name('cosmeticbrandwiseproduct_view');
Route::get('/cosmetic-all-brand', [CosmeticController::class, 'CosmatictBrand'])->name('cosmeticbrand_view');
Route::prefix('cbs')->group(function () {
    Route::get('/grocerycategory_view', [CosmeticController::class, 'CosmetictCategoryView'])->name('grocerycategory.view');
    Route::get('/{cat_slug}', [CosmeticController::class, 'CosmetictSubCategoryView'])->name('subcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}', [CosmeticController::class, 'CosmetictSubSubCategoryView12'])->name('subsubcategory.view');
    Route::get('/{cat_slug}/{subcat_slug}/{subsubcat_slug}', [CosmeticController::class, 'CosmetictGetProductView1'])->name('getproduct.view');
});

// ################################################## End For CosmeticController  ##################################################

// ################################################## End For ShopController  ##################################################
// Shop Page Route
Route::get('/shop', [ShopController::class, 'ShopPage'])->name('shop.page');

// ################################################## End For ShopController  ##################################################

// ################################################## End For InformationController  ##################################################
// Privacy & Policy route
Route::get('/privacy', [InformationController::class, 'privacy'])->name('info.privacy');
Route::get('/about', [InformationController::class, 'aboutPage'])->name('info.aboutPage');
Route::get('/terms&condition', [InformationController::class, 'termsCondition'])->name('info.terms');
Route::get('/returnpolicy', [InformationController::class, 'returnPolicy'])->name('info.policy');
// --------- Frontend Footer Information route  end ------------//
// ################################################## End For InformationController  ##################################################

// ################################################## End For LanguageController  ##################################################
// Multi language
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/hindi', [LanguageController::class, 'Hindi'])->name('hindi.language');
// ################################################## End For LanguageController  ##################################################

// ################################################## End For SocialiteLoginController  ##################################################
//Facebook Login
Route::get('login/google', [SocialiteLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [SocialiteLoginController::class, 'handleGoogleCallback']);

//Facebook Login
Route::get('login/facebook', [SocialiteLoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [SocialiteLoginController::class, 'handleFacebookCallback']);
// google login
Route::get('login/google', [SocialiteLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [SocialiteLoginController::class, 'handleGoogleCallback']);
// ################################################## End For SocialiteLoginController  ##################################################

// ################################################## End For LoginController  ##################################################

// Twitter Login
Route::get('login/twitter', [App\Http\Controllers\Auth\LoginController::class, 'redirectToTwitter'])->name('login.twitter');
Route::get('login/twitter/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleTwitterCallback']);

// ################################################## End For LoginController  ##################################################


// Product Add to cart route ajax  use in package
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// Product mini Cart ajax data
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Remove mini cart product
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Add to Wishlist product
Route::get('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);

Route::get('/user/mycart', [PageCartController::class, 'MyCart'])->name('mycart');

// My Cart show data
Route::get('/user/get-cart-product', [PageCartController::class, 'GetCartProduct']);

// Remove  Wishlist Product
Route::get('/user/cart-remove/{rowId}', [PageCartController::class, 'RemoveCartProduct']);

// product increment botton route
Route::get('/cart-increment/{rowId}', [PageCartController::class, 'CartIncrement']);

// product Decrement botton route
Route::get('/cart-decrement/{rowId}', [PageCartController::class, 'CartDecrement']);


// Frontend Coupon  apply
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

// Frontend Coupon Calculation
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

// Coupon Remove
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

//################# start Checkout Route //####################
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
Route::get('/checkout/info', [CartController::class, 'CheckoutInfo'])->name('checkout.info');
Route::get('/checkout/info/all', [CartController::class, 'CheckoutInfoAll'])->name('checkout.info.all');
Route::get('/checkout/info/select/check/{id}', [CartController::class, 'CheckoutInfoSelect']);
Route::post('/checkout/info/delete', [CartController::class, 'CheckoutInfoDelete'])->name('checkout.info.delete');
Route::post('/checkout/process', [CartController::class, 'CheckoutProcess'])->name('checkout.process');

//contact US
Route::get('/contact-us', function () {
    return view('frontend.contact.contact_us');
})->name('contact');
Route::get('/clearSession', function () {
    session()->flash('carts', 'Task was successful!');
    return 'clear';
});
// For Image
Route::get('/imageResize', [ImageController::class, 'imageResize']);

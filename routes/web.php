<?php

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}',[
  'uses' => 'ProductController@addToCart',
  'as' => 'product.addToCart'
]);

Route::get('/remove-from-cart/{id}',[
  'uses' => 'ProductController@removeFromCart',
  'as' => 'product.remove'
]);

Route::get('/checkout',[
  'uses' => 'ProductController@getCheckout',
  'as' => 'checkout'
]);

Route::get('/shoppingCart',[
  'uses' => 'ProductController@getCart',
  'as' => 'product.shoppingCart'
]);

Route::group(['prefix'=>'user'],function(){
  Route::group(['middleware'=>'guest'],function(){
    Route::get('/signup',[
        'uses' => 'UserController@getSignup',
        'as' => 'user.signup'
    ]);
    Route::post('/signup',[
        'uses' => 'UserController@postSignup',
        'as' => 'user.signup'
    ]);
    Route::get('/signin',[
      'uses' => 'UserController@getSignin',
      'as' => 'user.signin'
    ]);
    Route::post('/signin',[
      'uses' => 'UserController@postSignin',
      'as' => 'user.signin'
    ]);
    Route::post('/update',[
      'uses' => 'UserController@update',
      'as' => 'user.update'
    ]);
  });

  Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile',[
      'uses' => 'UserController@getProfile',
      'as' => 'user.profile'
    ]);
    Route::get('/logout',[
      'uses' => 'UserController@getLogout',
      'as' => 'user.logout'
    ]);
  });
});

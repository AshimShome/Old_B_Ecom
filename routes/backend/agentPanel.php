<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AgentPanelController;



 // search preoducd for agent panel
Route::get('admin/product/search/agent-search/{value}', [AgentPanelController::class, 'searchProductWithAjax']);
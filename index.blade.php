@extends('layouts.admin')
@section('content')

    <div class="col-md-9 dash-content">
        <div class="Title">
            <div class="category-btn">
                <h1>Categories <a href="javascript:void(0);" data-toggle="modal" data-target="#addCategoryModal"><svg
                            width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.8064 29.1574C22.768 29.1574 29.2222 22.7033 29.2222 14.7417C29.2222 6.78002 22.768 0.325867 14.8064 0.325867C6.84478 0.325867 0.390625 6.78002 0.390625 14.7417C0.390625 22.7033 6.84478 29.1574 14.8064 29.1574ZM13.7767 9.59316C13.7767 9.32006 13.8852 9.05816 14.0783 8.86505C14.2714 8.67194 14.5333 8.56346 14.8064 8.56346C15.0795 8.56346 15.3414 8.67194 15.5345 8.86505C15.7276 9.05816 15.8361 9.32006 15.8361 9.59316V13.712H19.9549C20.228 13.712 20.4899 13.8204 20.683 14.0135C20.8761 14.2066 20.9846 14.4686 20.9846 14.7417C20.9846 15.0147 20.8761 15.2767 20.683 15.4698C20.4899 15.6629 20.228 15.7713 19.9549 15.7713H15.8361V19.8901C15.8361 20.1632 15.7276 20.4251 15.5345 20.6183C15.3414 20.8114 15.0795 20.9198 14.8064 20.9198C14.5333 20.9198 14.2714 20.8114 14.0783 20.6183C13.8852 20.4251 13.7767 20.1632 13.7767 19.8901V15.7713H9.65792C9.38482 15.7713 9.12291 15.6629 8.92981 15.4698C8.7367 15.2767 8.62822 15.0147 8.62822 14.7417C8.62822 14.4686 8.7367 14.2066 8.92981 14.0135C9.12291 13.8204 9.38482 13.712 9.65792 13.712H13.7767V9.59316Z"
                                fill="#E23744" />
                        </svg></a>
                </h1>
            </div>
            <a href="javascript:void(0)" id="EditcategoryBtn" type="button" class="edit-btn" data-toggle="modal"
                data-target="#CategoryModal">Edit</a>
        </div>

        <div class="scrolling-wrapper-flexbox">
            @foreach ($categories as $category)
                <div class="card"><a href="javascript:void(0)" data-value="{{ $category->id }}"
                        id="category{{ $category->id }}"
                        class="foodcategory {{ $categories->first() == $category ? 'active' : '' }}">{{ ucwords($category->name) }}</a>
                </div>
            @endforeach
        </div>
        <div class="Title noline">
            <div class="category-btn">
                <h1>Sub-Categories <a href="javascript:void(0);" data-toggle="modal" data-target="#addSubCategoryModal"><svg
                            width="30" height="30" viewBox="0 0 30 30" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.8064 29.1574C22.768 29.1574 29.2222 22.7033 29.2222 14.7417C29.2222 6.78002 22.768 0.325867 14.8064 0.325867C6.84478 0.325867 0.390625 6.78002 0.390625 14.7417C0.390625 22.7033 6.84478 29.1574 14.8064 29.1574ZM13.7767 9.59316C13.7767 9.32006 13.8852 9.05816 14.0783 8.86505C14.2714 8.67194 14.5333 8.56346 14.8064 8.56346C15.0795 8.56346 15.3414 8.67194 15.5345 8.86505C15.7276 9.05816 15.8361 9.32006 15.8361 9.59316V13.712H19.9549C20.228 13.712 20.4899 13.8204 20.683 14.0135C20.8761 14.2066 20.9846 14.4686 20.9846 14.7417C20.9846 15.0147 20.8761 15.2767 20.683 15.4698C20.4899 15.6629 20.228 15.7713 19.9549 15.7713H15.8361V19.8901C15.8361 20.1632 15.7276 20.4251 15.5345 20.6183C15.3414 20.8114 15.0795 20.9198 14.8064 20.9198C14.5333 20.9198 14.2714 20.8114 14.0783 20.6183C13.8852 20.4251 13.7767 20.1632 13.7767 19.8901V15.7713H9.65792C9.38482 15.7713 9.12291 15.6629 8.92981 15.4698C8.7367 15.2767 8.62822 15.0147 8.62822 14.7417C8.62822 14.4686 8.7367 14.2066 8.92981 14.0135C9.12291 13.8204 9.38482 13.712 9.65792 13.712H13.7767V9.59316Z"
                                fill="#E23744" />
                        </svg></a>
                </h1>
            </div>
            <a href="javascript:void(0);" type="button" class="edit-btn" data-toggle="modal"
                data-target="#SubcategoryModal">Edit</a>
            <!-- Modal -->
        </div>
        <div class="scrolling-wrapper-flexbox foodSubcategories">

            @if ($categories->first()->subcategories()->exists())
                {{-- @if (count($categories) > 0) --}}
                @foreach ($categories->first()->subcategories as $subcategory)
                    <div class="card"><a href="javascript:void(0)" data-value="{{ $subcategory->id }}"
                            id="subcategory{{ $subcategory->id }}"
                            class="foodsubcategory {{ $categories->first()->subcategories()->first()->id == $subcategory->id? 'active': '' }}">{{ $subcategory->name }}</a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="food-temtable">
            <div class="Title noline">
                <div class="category-btn">
                    <h1>Food Items <a href="javascript:void(0);" type="button" class="edit-btn" data-toggle="modal"
                            data-target="#AddFoodModal" onclick="foodPopUptitle();"><svg width="30" height="30"
                                viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.8064 29.1574C22.768 29.1574 29.2222 22.7033 29.2222 14.7417C29.2222 6.78002 22.768 0.325867 14.8064 0.325867C6.84478 0.325867 0.390625 6.78002 0.390625 14.7417C0.390625 22.7033 6.84478 29.1574 14.8064 29.1574ZM13.7767 9.59316C13.7767 9.32006 13.8852 9.05816 14.0783 8.86505C14.2714 8.67194 14.5333 8.56346 14.8064 8.56346C15.0795 8.56346 15.3414 8.67194 15.5345 8.86505C15.7276 9.05816 15.8361 9.32006 15.8361 9.59316V13.712H19.9549C20.228 13.712 20.4899 13.8204 20.683 14.0135C20.8761 14.2066 20.9846 14.4686 20.9846 14.7417C20.9846 15.0147 20.8761 15.2767 20.683 15.4698C20.4899 15.6629 20.228 15.7713 19.9549 15.7713H15.8361V19.8901C15.8361 20.1632 15.7276 20.4251 15.5345 20.6183C15.3414 20.8114 15.0795 20.9198 14.8064 20.9198C14.5333 20.9198 14.2714 20.8114 14.0783 20.6183C13.8852 20.4251 13.7767 20.1632 13.7767 19.8901V15.7713H9.65792C9.38482 15.7713 9.12291 15.6629 8.92981 15.4698C8.7367 15.2767 8.62822 15.0147 8.62822 14.7417C8.62822 14.4686 8.7367 14.2066 8.92981 14.0135C9.12291 13.8204 9.38482 13.712 9.65792 13.712H13.7767V9.59316Z"
                                    fill="#E23744" />
                            </svg></a>
                    </h1>
                </div>

            </div>
            <div class="table-responsive menu_table_responsive">
                <table class="table fd" id="foodItems_table">
                    <tbody>
                        @if ($categories->first()->foodItems()->exists())
                            {{-- @if (count($categories) > 0) --}}
                            @php $i=1; @endphp
                            @foreach ($categories->first()->foodItems as $foodItem)
                                @if ($categories->first()->subcategories()->first()->id == $foodItem->subcategory_id)
                                    <tr>
                                        <td scope="row"><label>{{ $i }}</label>
                                            <p>{{ $foodItem->title }}</p>
                                        </td>
                                        <td class="hide-mobile"></td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <div class="Title tablebtn table_edit_dlte">
                                                    <a href="javascript:void(0)" data-value="{{ $foodItem->id }}"
                                                        type="button" class="edit-btn" data-toggle="modal"
                                                        data-target="#FoodModal"
                                                        onclick="editFooditemDetail('{{ $foodItem->id }}')">Edit</a>
                                                </div>

                                                <form id="delfood{{ $foodItem->id }}"
                                                    action="{{ route('admin.fooditems.destroy', $foodItem->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="Title tablebtn">
                                                        <a href="javascript:void(0)" class="del"
                                                            onclick="document.getElementById('delfood{{ $foodItem->id }}').submit()">Delete</a>
                                                    </div>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <div class="modal fade edit-form" id="SubcategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="SubcategoryModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Hot Category</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.07759 27.8714C11.2752 34.069 21.3234 34.069 27.521 27.8714C33.7186 21.6738 33.7186 11.6256 27.521 5.42796C21.3234 -0.769635 11.2752 -0.769635 5.07759 5.42796C-1.12001 11.6256 -1.12001 21.6738 5.07759 27.8714ZM19.5055 11.8404C19.7181 11.6278 20.0064 11.5084 20.3071 11.5084C20.6077 11.5084 20.896 11.6278 21.1086 11.8404C21.3212 12.053 21.4406 12.3413 21.4406 12.6419C21.4406 12.9426 21.3212 13.2309 21.1086 13.4435L17.9024 16.6497L21.1086 19.8559C21.3212 20.0685 21.4406 20.3568 21.4406 20.6574C21.4406 20.9581 21.3212 21.2464 21.1086 21.459C20.896 21.6716 20.6077 21.791 20.3071 21.791C20.0064 21.791 19.7181 21.6716 19.5055 21.459L16.2993 18.2528L13.0931 21.459C12.8805 21.6716 12.5922 21.791 12.2916 21.791C11.9909 21.791 11.7026 21.6716 11.49 21.459C11.2774 21.2464 11.158 20.9581 11.158 20.6574C11.158 20.3568 11.2774 20.0685 11.49 19.8559L14.6962 16.6497L11.49 13.4435C11.2774 13.2309 11.158 12.9426 11.158 12.6419C11.158 12.3413 11.2774 12.053 11.49 11.8404C11.7026 11.6278 11.9909 11.5084 12.2916 11.5084C12.5922 11.5084 12.8805 11.6278 13.0931 11.8404L16.2993 15.0466L19.5055 11.8404Z"
                                fill="#E23744" />
                        </svg>
                    </button>
                </div>
                <form class="popup-form m-0" id="editSubcategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="modal-body">
                        <div class="scrolling-wrapper-flexbox foodSubcategories">
                            @if ($categories->first()->subcategories()->exists())
                                {{-- @if (count($categories) > 0) --}}
                                @foreach ($categories->first()->subcategories as $subcategory)
                                    <div class="card"><a href="javascript:void(0)" data-value="{{ $subcategory->id }}"
                                            id="subcategory{{ $subcategory->id }}"
                                            class="foodsubcategory {{ $categories->first()->subcategories()->first() == $subcategory? 'active': '' }}">{{ $subcategory->name }}</a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <fieldset>
                            <div class="form-group editsubname">
                                <label>Sub-Category Name</label>
                                <input type="text" name="name" placeholder="Beverages" id="subcategoryName">
                                <p class="text-left">Words Remaining 50</p>
                            </div>
                            <div class="form-group editsubdescription">
                                <label>Description</label>
                                <textarea rows="4" cols="50" name="description" id="subcategoryDescription" class="desc"></textarea>
                                <p class="text-left">Words Remaining 250</p>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <div class="switch-btn">
                            <span>Enable/Disable</span>
                            <div class="users-ad">
                                <label class="switch">
                                    <input type="checkbox" checked="" id="subcategoryStatus" name="status">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="two-buttons">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <div class="modal fade edit-form" id="CategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="CategoryModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Beverages Category</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.07759 27.8714C11.2752 34.069 21.3234 34.069 27.521 27.8714C33.7186 21.6738 33.7186 11.6256 27.521 5.42796C21.3234 -0.769635 11.2752 -0.769635 5.07759 5.42796C-1.12001 11.6256 -1.12001 21.6738 5.07759 27.8714ZM19.5055 11.8404C19.7181 11.6278 20.0064 11.5084 20.3071 11.5084C20.6077 11.5084 20.896 11.6278 21.1086 11.8404C21.3212 12.053 21.4406 12.3413 21.4406 12.6419C21.4406 12.9426 21.3212 13.2309 21.1086 13.4435L17.9024 16.6497L21.1086 19.8559C21.3212 20.0685 21.4406 20.3568 21.4406 20.6574C21.4406 20.9581 21.3212 21.2464 21.1086 21.459C20.896 21.6716 20.6077 21.791 20.3071 21.791C20.0064 21.791 19.7181 21.6716 19.5055 21.459L16.2993 18.2528L13.0931 21.459C12.8805 21.6716 12.5922 21.791 12.2916 21.791C11.9909 21.791 11.7026 21.6716 11.49 21.459C11.2774 21.2464 11.158 20.9581 11.158 20.6574C11.158 20.3568 11.2774 20.0685 11.49 19.8559L14.6962 16.6497L11.49 13.4435C11.2774 13.2309 11.158 12.9426 11.158 12.6419C11.158 12.3413 11.2774 12.053 11.49 11.8404C11.7026 11.6278 11.9909 11.5084 12.2916 11.5084C12.5922 11.5084 12.8805 11.6278 13.0931 11.8404L16.2993 15.0466L19.5055 11.8404Z"
                                fill="#E23744" />
                        </svg>
                    </button>
                </div>
                <form class="popup-form m-0" id="editCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="modal-body">
                        <div class="scrolling-wrapper-flexbox">
                            @foreach ($categories as $category)
                                <div class="card"><a href="javascript:void(0)" data-value="{{ $category->id }}"
                                        id="editcategory{{ $category->id }}"
                                        class="editfoodcategory">{{ ucwords($category->name) }}</a></div>
                            @endforeach
                        </div>
                        <div class="product-detail">
                            <div class="p-image">
                                <img src="{{ asset('images/pizza.png') }}" id="imgPreview">
                            </div>
                            <div class="description">
                                <h4>Category image</h4>
                                <div class="Title tablebtn new">
                                    <label>Edit
                                        <input type="file" size="60" name="attach" id="categoryImage"
                                            accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <fieldset>
                            <div class="form-group editname">
                                <label>Category Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" id="categoryName">
                                <p class="text-left">Words Remaining 50</p>
                            </div>
                            <div class="form-group editdescription">
                                <label>Description</label>
                                <textarea rows="4" cols="50" id="categoryDescription" name="description" class="desc"></textarea>
                                <p class="text-left">Words Remaining 250</p>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <div class="switch-btn">
                            <span>Enable/Disable</span>
                            <div class="users-ad">
                                <label class="switch">
                                    <input type="checkbox" name="status" value="1" id="categoryStatus">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="two-buttons">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary saveCategory">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade edit-form" id="FoodModal" tabindex="-1" role="dialog" aria-labelledby="FoodModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Beverages Category</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.07759 27.8714C11.2752 34.069 21.3234 34.069 27.521 27.8714C33.7186 21.6738 33.7186 11.6256 27.521 5.42796C21.3234 -0.769635 11.2752 -0.769635 5.07759 5.42796C-1.12001 11.6256 -1.12001 21.6738 5.07759 27.8714ZM19.5055 11.8404C19.7181 11.6278 20.0064 11.5084 20.3071 11.5084C20.6077 11.5084 20.896 11.6278 21.1086 11.8404C21.3212 12.053 21.4406 12.3413 21.4406 12.6419C21.4406 12.9426 21.3212 13.2309 21.1086 13.4435L17.9024 16.6497L21.1086 19.8559C21.3212 20.0685 21.4406 20.3568 21.4406 20.6574C21.4406 20.9581 21.3212 21.2464 21.1086 21.459C20.896 21.6716 20.6077 21.791 20.3071 21.791C20.0064 21.791 19.7181 21.6716 19.5055 21.459L16.2993 18.2528L13.0931 21.459C12.8805 21.6716 12.5922 21.791 12.2916 21.791C11.9909 21.791 11.7026 21.6716 11.49 21.459C11.2774 21.2464 11.158 20.9581 11.158 20.6574C11.158 20.3568 11.2774 20.0685 11.49 19.8559L14.6962 16.6497L11.49 13.4435C11.2774 13.2309 11.158 12.9426 11.158 12.6419C11.158 12.3413 11.2774 12.053 11.49 11.8404C11.7026 11.6278 11.9909 11.5084 12.2916 11.5084C12.5922 11.5084 12.8805 11.6278 13.0931 11.8404L16.2993 15.0466L19.5055 11.8404Z"
                                fill="#E23744" />
                        </svg>
                    </button>
                </div>
                <form class="popup-form" id="editFoodItemForm" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="modal-body">
                        <div class="scrolling-wrapper-flexbox" id="foodItemList">
                            @if ($categories->first()->foodItems()->exists())
                                {{-- @if (count($categories) > 0) --}}
                                @foreach ($categories->first()->foodItems as $foodItem)
                                    @if ($categories->first()->subcategories()->first()->id == $foodItem->subcategory_id)
                                        <div class="card"><a data-value="{{ $foodItem->id }}"
                                                id="foodItem{{ $foodItem->id }}" class="foodItemTab"
                                                href="javascript:void(0)">{{ $foodItem->title }}</a></div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="product-detail">
                            <div class="p-image">
                                <img src="{{ asset('images/pizza.png') }}" class="preview">
                            </div>
                            <div class="description">
                                <h4>Food Item Image</h4>
                                <div class="Title tablebtn new">
                                    <label>Edit
                                        <input type="file" size="60" accept="image/*" name="attach">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <fieldset>

                            <div class="form-group">
                                <label>Food Item Title</label>
                                <input type="text" name="title" placeholder="">
                                <p class="text-left">Words Remaining 50</p>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea rows="4" cols="50" class="desc" name="description"></textarea>
                                <p class="text-left">Words Remaining 250</p>
                            </div>
                            <div class="form-group inventory">
                                <label>Inventory</label>
                                <input type="text" name="inventory" placeholder="20" class="onlynumeric">
                            </div>
                            <div class="Fooditemvariants">
                                <div class="form-group addon foodvariantgroups" id="foodvariant_0" data-value="0">
                                    <input type="hidden" name="ids[]" placeholder="">
                                    <div class="one">
                                        <label>Add on</label>
                                        <input type="text" name="addons[]" placeholder="">
                                    </div>
                                    <div class="two">
                                        <label>Quantity</label>
                                        <div class="quan">
                                            <div class="value-button decrease" value="Decrease Value">-</div>
                                            <input type="text" value="0" name="quantity[]" class="onlynumeric"
                                                max="1000">
                                            <div class="value-button increase" value="Increase Value">+</div>
                                        </div>
                                    </div>
                                    <div class="three">
                                        <label>Price</label>
                                        <input type="text" name="price[]" placeholder="" class="decimalp2">
                                    </div>
                                    <div class="add-btn addvariant">
                                        <label style="opacity:0;">add</label>
                                        <a href="#"><svg width="33" height="33" viewBox="0 0 33 33"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.268228 16.1842C0.268227 24.9537 7.3773 32.055 16.1468 32.0454C24.9163 32.0359 32.0254 24.919 32.0254 16.1495C32.0254 7.37998 24.9163 0.278669 16.1468 0.288248C7.3773 0.297826 0.268228 7.41466 0.268228 16.1842ZM21.8177 15.0265C22.1185 15.0261 22.407 15.1453 22.6197 15.3578C22.8324 15.5702 22.9519 15.8586 22.9519 16.1594C22.9519 16.4602 22.8324 16.7488 22.6197 16.9618C22.407 17.1747 22.1185 17.2945 21.8177 17.2948L17.281 17.2998L17.281 21.8365C17.281 22.1373 17.1615 22.4259 16.9488 22.6389C16.7361 22.8518 16.4476 22.9716 16.1468 22.9719C15.846 22.9723 15.5575 22.8531 15.3448 22.6406C15.1321 22.4282 15.0126 22.1398 15.0126 21.839L15.0126 17.3023L10.4759 17.3072C10.1751 17.3075 9.8866 17.1884 9.6739 16.9759C9.4612 16.7634 9.3417 16.4751 9.3417 16.1743C9.3417 15.8735 9.4612 15.5849 9.6739 15.3719C9.8866 15.159 10.1751 15.0392 10.4759 15.0388L15.0126 15.0339L15.0126 10.4972C15.0126 10.1963 15.1321 9.90773 15.3448 9.6948C15.5575 9.48187 15.846 9.36206 16.1468 9.36173C16.4476 9.3614 16.7361 9.48058 16.9488 9.69305C17.1615 9.90552 17.281 10.1939 17.281 10.4947L17.281 15.0314L21.8177 15.0265Z"
                                                    fill="#E23744" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                    </div>
                    <div class="modal-footer">
                        <div class="switch-btn">
                            <span>Enable/Disable</span>
                            <div class="users-ad">
                                <label class="switch">
                                    <input type="checkbox" checked="" name="status">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="two-buttons">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade edit-form categrgy_form_add" id="addCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="addCategoryModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="popup-form m-0" id="addCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Add Category</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.07759 27.8714C11.2752 34.069 21.3234 34.069 27.521 27.8714C33.7186 21.6738 33.7186 11.6256 27.521 5.42796C21.3234 -0.769635 11.2752 -0.769635 5.07759 5.42796C-1.12001 11.6256 -1.12001 21.6738 5.07759 27.8714ZM19.5055 11.8404C19.7181 11.6278 20.0064 11.5084 20.3071 11.5084C20.6077 11.5084 20.896 11.6278 21.1086 11.8404C21.3212 12.053 21.4406 12.3413 21.4406 12.6419C21.4406 12.9426 21.3212 13.2309 21.1086 13.4435L17.9024 16.6497L21.1086 19.8559C21.3212 20.0685 21.4406 20.3568 21.4406 20.6574C21.4406 20.9581 21.3212 21.2464 21.1086 21.459C20.896 21.6716 20.6077 21.791 20.3071 21.791C20.0064 21.791 19.7181 21.6716 19.5055 21.459L16.2993 18.2528L13.0931 21.459C12.8805 21.6716 12.5922 21.791 12.2916 21.791C11.9909 21.791 11.7026 21.6716 11.49 21.459C11.2774 21.2464 11.158 20.9581 11.158 20.6574C11.158 20.3568 11.2774 20.0685 11.49 19.8559L14.6962 16.6497L11.49 13.4435C11.2774 13.2309 11.158 12.9426 11.158 12.6419C11.158 12.3413 11.2774 12.053 11.49 11.8404C11.7026 11.6278 11.9909 11.5084 12.2916 11.5084C12.5922 11.5084 12.8805 11.6278 13.0931 11.8404L16.2993 15.0466L19.5055 11.8404Z"
                                    fill="#E23744" />
                            </svg>
                        </button>
                    </div>
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group banner_offer_section">
                                <label>Category Image</label>
                                <div class="upload_certificate">
                                    <img class="preview w-100">
                                    <span>
                                        <i class="fa fa-image mr-2 d-block mb-2"></i>
                                        Upload Image
                                        <p>Mandatory image dimensions:500 by 500 pixels </p>
                                    </span>
                                    <input type="file" name="attach" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group mt-3 nameDiv">
                                <label>Category Name</label>
                                <input type="text" name="name" placeholder="Beverages" value="">
                                <p class="text-left">Words Remaining 50</p>
                            </div>
                            <div class="form-group descriptionDiv">
                                <label>Description</label>
                                <textarea rows="4" cols="50" name="description" class="desc"></textarea>
                                <p class="text-left">Words Remaining 250</p>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <div class="switch-btn">
                            <span>Enable/Disable</span>
                            <div class="users-ad">
                                <label class="switch">
                                    <input type="checkbox" checked="" name="status">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="two-buttons">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade edit-form categrgy_form_add" id="addSubCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="addSubCategoryModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="popup-form m-0" id="addSubCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Add Sub-Category</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.07759 27.8714C11.2752 34.069 21.3234 34.069 27.521 27.8714C33.7186 21.6738 33.7186 11.6256 27.521 5.42796C21.3234 -0.769635 11.2752 -0.769635 5.07759 5.42796C-1.12001 11.6256 -1.12001 21.6738 5.07759 27.8714ZM19.5055 11.8404C19.7181 11.6278 20.0064 11.5084 20.3071 11.5084C20.6077 11.5084 20.896 11.6278 21.1086 11.8404C21.3212 12.053 21.4406 12.3413 21.4406 12.6419C21.4406 12.9426 21.3212 13.2309 21.1086 13.4435L17.9024 16.6497L21.1086 19.8559C21.3212 20.0685 21.4406 20.3568 21.4406 20.6574C21.4406 20.9581 21.3212 21.2464 21.1086 21.459C20.896 21.6716 20.6077 21.791 20.3071 21.791C20.0064 21.791 19.7181 21.6716 19.5055 21.459L16.2993 18.2528L13.0931 21.459C12.8805 21.6716 12.5922 21.791 12.2916 21.791C11.9909 21.791 11.7026 21.6716 11.49 21.459C11.2774 21.2464 11.158 20.9581 11.158 20.6574C11.158 20.3568 11.2774 20.0685 11.49 19.8559L14.6962 16.6497L11.49 13.4435C11.2774 13.2309 11.158 12.9426 11.158 12.6419C11.158 12.3413 11.2774 12.053 11.49 11.8404C11.7026 11.6278 11.9909 11.5084 12.2916 11.5084C12.5922 11.5084 12.8805 11.6278 13.0931 11.8404L16.2993 15.0466L19.5055 11.8404Z"
                                    fill="#E23744" />
                            </svg>
                        </button>
                    </div>
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group mt-3 nameDiv">
                                <label>Sub-Category Name</label>
                                <input type="text" name="name" placeholder="Beverages" value="">
                                <p class="text-left">Words Remaining 50</p>
                            </div>
                            <div class="form-group descriptionDiv">
                                <label>Description</label>
                                <textarea rows="4" cols="50" name="description" class="desc"></textarea>
                                <p class="text-left">Words Remaining 250</p>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <div class="switch-btn">
                            <span>Enable/Disable</span>
                            <div class="users-ad">
                                <label class="switch">
                                    <input type="checkbox" checked="" name="status">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="two-buttons">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade edit-form categrgy_form_add" id="AddFoodModal" tabindex="-1" role="dialog"
        aria-labelledby="AddFoodModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Food item</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.07759 27.8714C11.2752 34.069 21.3234 34.069 27.521 27.8714C33.7186 21.6738 33.7186 11.6256 27.521 5.42796C21.3234 -0.769635 11.2752 -0.769635 5.07759 5.42796C-1.12001 11.6256 -1.12001 21.6738 5.07759 27.8714ZM19.5055 11.8404C19.7181 11.6278 20.0064 11.5084 20.3071 11.5084C20.6077 11.5084 20.896 11.6278 21.1086 11.8404C21.3212 12.053 21.4406 12.3413 21.4406 12.6419C21.4406 12.9426 21.3212 13.2309 21.1086 13.4435L17.9024 16.6497L21.1086 19.8559C21.3212 20.0685 21.4406 20.3568 21.4406 20.6574C21.4406 20.9581 21.3212 21.2464 21.1086 21.459C20.896 21.6716 20.6077 21.791 20.3071 21.791C20.0064 21.791 19.7181 21.6716 19.5055 21.459L16.2993 18.2528L13.0931 21.459C12.8805 21.6716 12.5922 21.791 12.2916 21.791C11.9909 21.791 11.7026 21.6716 11.49 21.459C11.2774 21.2464 11.158 20.9581 11.158 20.6574C11.158 20.3568 11.2774 20.0685 11.49 19.8559L14.6962 16.6497L11.49 13.4435C11.2774 13.2309 11.158 12.9426 11.158 12.6419C11.158 12.3413 11.2774 12.053 11.49 11.8404C11.7026 11.6278 11.9909 11.5084 12.2916 11.5084C12.5922 11.5084 12.8805 11.6278 13.0931 11.8404L16.2993 15.0466L19.5055 11.8404Z"
                                fill="#E23744" />
                        </svg>
                    </button>
                </div>
                <form class="popup-form" id="addFoodItemForm" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group banner_offer_section">
                                <label>Food Item Image</label>
                                <div class="upload_certificate">
                                    <img class="preview w-100">
                                    <span>
                                        <i class="fa fa-image mr-2 d-block mb-2"></i>
                                        Upload Image
                                        <p>Mandatory image dimensions:500 by 500 pixels </p>
                                    </span>
                                    <input type="file" name="attach" accept="image/*">
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label>Food Item Title</label>
                                <input type="text" name="title" placeholder="">
                                <p class="text-left">Words Remaining 50</p>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea rows="4" cols="50" class="desc" name="description"></textarea>
                                <p class="text-left">Words Remaining 250</p>
                            </div>
                            <div class="form-group inventory">
                                <label>Inventory</label>
                                <input type="text" name="inventory" placeholder="20" class="onlynumeric">
                            </div>
                            <div class="Fooditemvariants">
                                <div class="form-group addon foodvariantgroups" id="foodvariant_0" data-value="0">
                                    <input type="hidden" name="ids[]" placeholder="">
                                    <div class="one">
                                        <label>Add on</label>
                                        <input type="text" name="addons[]" placeholder="">
                                    </div>
                                    <div class="two">
                                        <label>Quantity</label>
                                        <div class="quan">
                                            <div class="value-button decrease" value="Decrease Value">-</div>
                                            <input type="text" value="0" name="quantity[]" class="onlynumeric"
                                                max="1000">
                                            <div class="value-button increase" value="Increase Value">+</div>
                                        </div>
                                    </div>
                                    <div class="three">
                                        <label>Price</label>
                                        <input type="text" name="price[]" placeholder="" class="decimalp2">
                                    </div>
                                    <div class="add-btn addvariant">
                                        <label style="opacity:0;">add</label>
                                        <a href="#"><svg width="33" height="33" viewBox="0 0 33 33"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.268228 16.1842C0.268227 24.9537 7.3773 32.055 16.1468 32.0454C24.9163 32.0359 32.0254 24.919 32.0254 16.1495C32.0254 7.37998 24.9163 0.278669 16.1468 0.288248C7.3773 0.297826 0.268228 7.41466 0.268228 16.1842ZM21.8177 15.0265C22.1185 15.0261 22.407 15.1453 22.6197 15.3578C22.8324 15.5702 22.9519 15.8586 22.9519 16.1594C22.9519 16.4602 22.8324 16.7488 22.6197 16.9618C22.407 17.1747 22.1185 17.2945 21.8177 17.2948L17.281 17.2998L17.281 21.8365C17.281 22.1373 17.1615 22.4259 16.9488 22.6389C16.7361 22.8518 16.4476 22.9716 16.1468 22.9719C15.846 22.9723 15.5575 22.8531 15.3448 22.6406C15.1321 22.4282 15.0126 22.1398 15.0126 21.839L15.0126 17.3023L10.4759 17.3072C10.1751 17.3075 9.8866 17.1884 9.6739 16.9759C9.4612 16.7634 9.3417 16.4751 9.3417 16.1743C9.3417 15.8735 9.4612 15.5849 9.6739 15.3719C9.8866 15.159 10.1751 15.0392 10.4759 15.0388L15.0126 15.0339L15.0126 10.4972C15.0126 10.1963 15.1321 9.90773 15.3448 9.6948C15.5575 9.48187 15.846 9.36206 16.1468 9.36173C16.4476 9.3614 16.7361 9.48058 16.9488 9.69305C17.1615 9.90552 17.281 10.1939 17.281 10.4947L17.281 15.0314L21.8177 15.0265Z"
                                                    fill="#E23744" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                    </div>
                    <div class="modal-footer">
                        <div class="switch-btn">
                            <span>Enable/Disable</span>
                            <div class="users-ad">
                                <label class="switch">
                                    <input type="checkbox" checked="" name="status">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="two-buttons">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('scripts')
    @parent
    <script type="text/html" id="addFoodvariant">
  <div class="form-group addon foodvariantgroups">
    <input type="hidden" name="ids[]" placeholder="">
    <div class="one">
      <label>Add on</label>
      <input type="text" name="addons[]" placeholder="">
    </div>
    <div class="two">
      <label>Quantity</label>
      <div class="quan">
        <div class="value-button decrease" value="Decrease Value">-</div>
        <input type="text" value="0" name="quantity[]" class="onlynumeric" max="1000">
        <div class="value-button increase"  value="Increase Value">+</div>
      </div>
    </div>
    <div class="three">
      <label>Price</label>
      <input type="text" name="price[]" placeholder="" class="decimalp2">
    </div>
    <div class="add-btn">
      <label style="opacity:0;">add</label>
      <a href="javascript:void(0)" class="deleteVariant">
        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M5.07759 27.8714C11.2752 34.069 21.3234 34.069 27.521 27.8714C33.7186 21.6738 33.7186 11.6256 27.521 5.42796C21.3234 -0.769635 11.2752 -0.769635 5.07759 5.42796C-1.12001 11.6256 -1.12001 21.6738 5.07759 27.8714ZM19.5055 11.8404C19.7181 11.6278 20.0064 11.5084 20.3071 11.5084C20.6077 11.5084 20.896 11.6278 21.1086 11.8404C21.3212 12.053 21.4406 12.3413 21.4406 12.6419C21.4406 12.9426 21.3212 13.2309 21.1086 13.4435L17.9024 16.6497L21.1086 19.8559C21.3212 20.0685 21.4406 20.3568 21.4406 20.6574C21.4406 20.9581 21.3212 21.2464 21.1086 21.459C20.896 21.6716 20.6077 21.791 20.3071 21.791C20.0064 21.791 19.7181 21.6716 19.5055 21.459L16.2993 18.2528L13.0931 21.459C12.8805 21.6716 12.5922 21.791 12.2916 21.791C11.9909 21.791 11.7026 21.6716 11.49 21.459C11.2774 21.2464 11.158 20.9581 11.158 20.6574C11.158 20.3568 11.2774 20.0685 11.49 19.8559L14.6962 16.6497L11.49 13.4435C11.2774 13.2309 11.158 12.9426 11.158 12.6419C11.158 12.3413 11.2774 12.053 11.49 11.8404C11.7026 11.6278 11.9909 11.5084 12.2916 11.5084C12.5922 11.5084 12.8805 11.6278 13.0931 11.8404L16.2993 15.0466L19.5055 11.8404Z"
            fill="#E23744" />
        </svg>
      </a>
    </div>
  </div>
</script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var template = $("#addFoodvariant").html();
            $(document).on("click", ".addvariant", function() {
                $(this).closest('form').find(".Fooditemvariants").append(template);
            });

            $("#editCategoryForm").on('submit', function(e) {
                e.preventDefault();
                var categoryId = $(".editfoodcategory.active").data('value');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/categories/') }}/" + categoryId,
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    // beforeSend: function(){
                    //     $('.saveCategory').attr("disabled","disabled");
                    //     $('#editCategoryForm').css("opacity",".5");
                    // },
                    success: function(data) {

                        if ($.isEmptyObject(data.error)) {
                            //alert(data.success);
                            location.reload();
                        } else {
                            printErrorMsg(data.error, 'editCategoryForm');
                            $('#CategoryModal').animate({
                                scrollTop: 0
                            }, 'slow');
                        }
                    }
                });
            });

            $("#editSubcategoryForm").on('submit', function(e) {
                e.preventDefault();
                var subcategoryId = $("#editSubcategoryForm").find(".foodsubcategory.active").data('value');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/subcategories/') }}/" + subcategoryId,
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    // beforeSend: function(){
                    //     $('.saveCategory').attr("disabled","disabled");
                    //     $('#editCategoryForm').css("opacity",".5");
                    // },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //alert(data.success);
                            location.reload();
                        } else {
                            printErrorMsg(data.error, 'editSubcategoryForm');
                            $('#SubcategoryModal').animate({
                                scrollTop: 0
                            }, 'slow');
                        }
                    }
                });
            });

            $("#addCategoryForm").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/categories/') }}",
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    // beforeSend: function(){
                    //     $('.saveCategory').attr("disabled","disabled");
                    //     $('#editCategoryForm').css("opacity",".5");
                    // },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //alert(data.success);
                            location.reload();
                        } else {
                            printErrorMsg(data.error, 'addCategoryForm');
                            $('#addCategoryModal').animate({
                                scrollTop: 0
                            }, 'slow');
                        }
                    }
                });
            });

            $("#addSubCategoryForm").on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var category_id = $(".foodcategory.active").data('value');
                formData.append('category_id', category_id);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/subcategories/') }}",
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    // beforeSend: function(){
                    //     $('.saveCategory').attr("disabled","disabled");
                    //     $('#editCategoryForm').css("opacity",".5");
                    // },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //alert(data.success);
                            location.reload();
                        } else {
                            printErrorMsg(data.error, 'addSubCategoryForm');
                            $('#addSubCategoryModal').animate({
                                scrollTop: 0
                            }, 'slow');
                        }
                    }
                });
            });

            $("#editFoodItemForm").on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var foodItemId = $(".foodItemTab.active").data('value');
                formData.append('foodItemId', foodItemId);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/fooditems/') }}/" + foodItemId,
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    // beforeSend: function(){
                    //     $('.saveCategory').attr("disabled","disabled");
                    //     $('#editCategoryForm').css("opacity",".5");
                    // },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            location.reload();
                        } else {
                            printErrorMsg(data.error, 'editFoodItemForm');
                            $('#FoodModal').animate({
                                scrollTop: 0
                            }, 'slow');
                        }
                    }
                });
            });

            $("#addFoodItemForm").on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var subcategoryId = $(".foodsubcategory.active").data('value');
                var categoryId = $(".foodcategory.active").data('value');
                formData.append('category_id', categoryId);
                if (subcategoryId != undefined) {
                    formData.append('subcategory_id', subcategoryId);
                }

                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/fooditems/') }}",
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    // beforeSend: function(){
                    //     $('.saveCategory').attr("disabled","disabled");
                    //     $('#editCategoryForm').css("opacity",".5");
                    // },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            location.reload();
                        } else {
                            printErrorMsg(data.error, 'addFoodItemForm');
                            $('#AddFoodModal').animate({
                                scrollTop: 0
                            }, 'slow');
                        }
                    }
                });
            });

            $(".foodcategory").click(function() {
                var categoryId = $(this).data('value');
                var subcategoryId = $(".foodsubcategory.active").data('value');
                $.ajax({
                    url: "{{ url('/admin/menus') }}/" + categoryId,
                    type: 'GET',
                    data: {
                        subcategoryId: subcategoryId
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        $(".foodcategory").removeClass('active');
                        $("#category" + categoryId).addClass('active');
                        $(".foodSubcategories").html(data.html);
                        $("#foodItems_table tbody").html(data.fooditems);
                        $("#foodItemList").html(data.foodItemTabs);
                    }
                });
            });

            $('#CategoryModal').on('show.bs.modal', function() {
                var categoryId = $(".foodcategory.active").data('value');
                editCategoryDetail(categoryId);
            });

            $('#SubcategoryModal').on('show.bs.modal', function() {
                var subcategoryId = $(".foodsubcategory.active").data('value');
                editSubcategoryDetail(subcategoryId);
            });

            $(".editfoodcategory").click(function() {
                var categoryId = $(this).data('value');
                editCategoryDetail(categoryId);
            });

            $("input[name='name'], input[name='title']").keyup(function() {
                var charcount = parseInt(50) - $(this).val().length;
                $(this).closest('.form-group').find('.text-left').html('Words Remaining ' + charcount);
            });

            $(".desc").keyup(function() {
                var charcount = parseInt(250) - $(this).val().length;
                $(this).closest('.form-group').find('.text-left').html('Words Remaining ' + charcount);
            });

            $('#categoryImage').change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });


            $(document).on("click", ".foodsubcategory", function() {
                var subcategoryId = $(this).data('value');
                var categoryId = $(".foodcategory.active").data('value');
                $.ajax({
                    url: "{{ url('/admin/subcategories') }}/" + subcategoryId,
                    type: 'GET',
                    data: {
                        categoryId: categoryId
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        $(".foodsubcategory").removeClass('active');
                        $("#subcategory" + subcategoryId).addClass('active');
                        $("#foodItems_table tbody").html(data.fooditems);
                        $("#foodItemList").html(data.foodItemTabs);
                    }
                });
            });

            $(document).on("click", ".foodItemTab", function() {
                var foodItemId = $(this).data('value');
                editFooditemDetail(foodItemId);
            });

            $(document).on("click", "#editSubcategoryForm .foodsubcategory", function() {
                var subcategoryId = $(this).data('value');
                editSubcategoryDetail(subcategoryId);
            });

            $('#SubcategoryModal').on('show.bs.modal', function() {
                var subcategoryId = $(".foodsubcategory.active").data('value');
                editSubcategoryDetail(subcategoryId);
            });

            $(document).on("click", ".deleteVariant", function() {
                var Id = $(this).closest('.foodvariantgroups').find("input[type='hidden']").val();
                if (Id != '') {
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('ajaxUpdate') }}",
                        data: {
                            action: 'removeFoodAddon',
                            relationId: Id
                        },
                        dataType: 'JSON',
                        success: function(data) {}
                    });
                }
                $(this).closest('.foodvariantgroups').remove();

            });

            $(document).on("click", ".decrease", function() {
                var value = $(this).closest('.quan').find('input').val();
                value = isNaN(value) ? 0 : value;
                value < 1 ? value = 1 : '';
                value--;
                $(this).closest('.quan').find('input').val(value);
            });

            $(document).on("click", ".increase", function() {
                var value = $(this).closest('.quan').find('input').val();
                value = isNaN(value) ? 0 : value;
                value < 1 ? value = 1 : '';
                value++;
                $(this).closest('.quan').find('input').val(value);
            });

            $(document).on("change", "input[name='attach']", function() {
                const file = this.files[0];
                let form = $(this).closest('form')
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $(form).find('.preview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });

        });

        function editCategoryDetail(categoryId) {
            $.ajax({
                url: "{{ url('/admin/menus') }}/" + categoryId,
                type: 'GET',
                data: {},
                dataType: 'JSON',
                success: function(data) {
                    $('#CategoryModal').find('.modal-title').html('Edit ' + data.category.name + ' Category');
                    $(".editfoodcategory").removeClass('active');
                    $("#editcategory" + categoryId).addClass('active');
                    $("#categoryName").val(data.category.name);
                    $("#categoryDescription").val(data.category.description);
                    $("#categoryStatus").prop('checked', data.category.status == 1 ? true : false);
                    var namecount = parseInt(50) - data.category.name.length;
                    $(".editname").find('.text-left').html('Words Remaining ' + namecount);
                    var descount = parseInt(250) - data.category.description.length;
                    $(".editdescription").find('.text-left').html('Words Remaining ' + descount);
                    if (data.category.attachment != null) {
                        $("#imgPreview").attr('src', data.category.attachment.attach_url);
                    } else {
                        $("#imgPreview").attr('src', "{{ asset('images/pizza.png') }}");

                    }
                }
            });
        }

        function editSubcategoryDetail(subcategoryId) {
            $.ajax({
                url: "{{ url('/admin/subcategories') }}/" + subcategoryId,
                type: 'GET',
                data: {},
                dataType: 'JSON',
                success: function(data) {
                    $('#SubcategoryModal').find('.modal-title').html('Edit ' + data.subcategory.category.name +
                        ' Category');
                    $('#AddFoodModal').find('.modal-title').html(data.subcategory.category.name + ' > ' + data
                        .subcategory.name);
                    $('#FoodModal').find('.modal-title').html(data.subcategory.category.name + ' > ' + data
                        .subcategory.name);
                    $("#editSubcategoryForm .editfoodsubcategory").removeClass('active');
                    $("#editSubcategoryForm").find("#subcategory" + subcategoryId).addClass('active');
                    $("#subcategoryName").val(data.subcategory.name);
                    $("#subcategoryDescription").val(data.subcategory.description);
                    $("#subcategoryStatus").prop('checked', data.subcategory.status == 1 ? true : false);
                    var namecount = parseInt(50) - data.subcategory.name.length;
                    $(".editsubname").find('.text-left').html('Words Remaining ' + namecount);
                    var descount = parseInt(250) - data.subcategory.description.length;
                    $(".editsubdescription").find('.text-left').html('Words Remaining ' + descount);
                }
            });
        }

        function editFooditemDetail(foodItemId) {
            $.ajax({
                url: "{{ url('/admin/fooditems') }}/" + foodItemId,
                type: 'GET',
                data: {},
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $("#editFoodItemForm .foodItemTab").removeClass('active');
                    $("#editFoodItemForm").find("#foodItem" + foodItemId).addClass('active');
                    $("#editFoodItemForm input[name='title']").val(data.foodItem.title);
                    $("#editFoodItemForm .desc").val(data.foodItem.description);
                    $("#editFoodItemForm input[name='inventory']").val(data.foodItem.inventory);
                    $("#editFoodItemForm input[name='status']").prop('checked', data.foodItem.status == 1 ?
                        true : false);
                    $("#editFoodItemForm .Fooditemvariants").html(data.addonsHTML);
                    if (data.foodItem.attachment != null) {
                        $("#editFoodItemForm").find('.p-image img').attr('src', data.foodItem.attachment
                            .attach_url);
                    }
                    var subcategoryName = data.foodItem.subcategory != null ? ' > ' + data.foodItem.subcategory
                        .name : '';
                    $('#FoodModal').find('.modal-title').html(data.foodItem.category.name + subcategoryName);
                }
            });
        }

        function printErrorMsg(msg, form) {
            $("#" + form).find(".print-error-msg").find("ul").html('');
            $("#" + form).find(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $("#" + form).find(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }

        function foodPopUptitle() {
            var categoryname = $(".foodcategory.active").html();
            var subcategoryname = $(".foodsubcategory.active").html();
            subcategoryname = subcategoryname != undefined ? ' > ' + subcategoryname : '';
            $('#AddFoodModal').find('.modal-title').html(categoryname + subcategoryname);
        }
    </script>
@endsection
@endsection

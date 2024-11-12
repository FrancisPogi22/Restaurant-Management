<div class="modal fade" id="productModal" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Product Form</h1>
            </div>
            <form id="productForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
                    <div class="field-con">
                        <input type="file" name="product_image" accept=".jpeg, .jpg, .png" required>
                    </div>
                    <div class="field-con">
                        <select name="category" required>
                            <option value="" selected hidden disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field-con">
                        <input type="text" name="product_name" placeholder="Enter product name" required>
                    </div>
                    <div class="field-con">
                        <textarea name="product_description" cols="30" rows="2" placeholder="Enter product description"></textarea>
                    </div>
                    <div class="field-con">
                        <input type="number" name="product_price" placeholder="Enter product price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" id="closeModalBtn"><span
                            id="btn-text">Close</button>
                    <button class="modal-secondary-btn" id="createProductBtn"><span id="btn-text">Create
                            Product</span></button>
                </div>
            </form>
        </div>
    </div>
</div>

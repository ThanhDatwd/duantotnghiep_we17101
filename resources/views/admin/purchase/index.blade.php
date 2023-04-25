@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/purchase.css')}}">

@endsection
@section('content')
<div class="">
    <div class="row px-4 kax">
        <div class="col-8 h-100 pt-4 ">
            <div class="import-area">
                <form id="product-form">
                    <div class="product-info d-flex gap-2">
                        <select id="product-name" class="form-select">
                            <option value="">--Chọn sản phẩm--</option>
                            @foreach ($products as $item)
                            <option data-id="{{$item->id}}" value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control form-control-sm" id="product-price"
                            placeholder="Giá sản phẩm">
                        <input type="text" class="form-control form-control-sm" id="product-quantity"
                            placeholder="Số lượng">
                        <button type="button" class="form-control form-control-sm" class="product-controls add-product"
                            onclick="addProduct()">Nhập</button>
                    </div>
                </form>
                <div id="table-parent">
                    <table id="product-table" class="table text-start align-middle table-bordered table-hover mb-0 mt-4">
                        <thead>
                            <tr class="text-dark table-info">
                                <th><input class="form-check-input" type="checkbox"></th>
                                <th>Tên sản phẩm</th>
                                <th class="text-end">Gía nhập</th>
                                <th class="text-end">Số lượng </th>
                                <th class="text-end">Tổng</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4 bg-light purchase-info-area ">
                <div>
                    <div class="purchase-info__header d-flex justify-content-between py-2 mb-2">
                        <div class="purchase-info__author d-flex gap-3">
                            <img src="" alt="">
                            <div>Admin</div>
                        </div>
                        <div class="purchase-info__time">{{date('d/m/20y')}}</div>
                    </div>
                    <div class="purchase-info__body">
                           <div class="purchase-info__item d-flex align-items-end gap-4">
                                <select id="purchase_brand" class="form-select">
                                    <option value="">--Chọn nhà cung cấp--</option>
                                    @foreach ($brands as $item)
                                    <option  value="{{$item->brands}}">{{$item->brands}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="purchase-info__item d-flex align-items-end gap-4">
                                <label  class="col-form-label">Mã phiếu nhập</label>
                                <input  id="purchase_code" type="text"  maxlength="6"  class="form-control">
                            </div>
                            <div class="purchase-info__item d-flex align-items-end gap-4">
                                <label  class="col-form-label">Trạng thái</label>
                                <div id="purchase_status" class="purchase-info__item-text">Phiếu tạm</div>
                            </div>
                            <div class="purchase-info__item d-flex align-items-end gap-4">
                                <label  class="col-form-label">Tổng tiền hàng</label>
                                <div id="purchase_total_temp" class="purchase-info__item-text">0</div>
                            </div>
                            <div class="purchase-info__item price d-flex align-items-end gap-4">
                                <label  class="col-form-label">Giảm giá</label>
                                <input id="purchase_total_discount" type="text"  value="0" class="form-control">
                            </div>
                            <div class="purchase-info__item price hilight d-flex align-items-end gap-4">
                                <label class="col-form-label">Cần trả nhà cung cấp</label>
                                <div  id="purchase_total" class="purchase-info__item-text" >0</div>
                            </div>
                            {{-- <div class="purchase-info__item price d-flex align-items-end gap-4">
                                <label id="" class="col-form-label">Tổng tiền hàng</label>
                                <div class="purchase-info__item-text">10000</div>
                            </div> --}}
                    </div>
                </div>
                <div class="purchase-info__footer d-flex justify-content-around">
                    <button class="btn btn-secondary" onclick="handleCancel()">Hủy</button>
                    <button class="btn btn-info" onclick="handlePurchase(false)">Lưu Tạm</button>
                    <button class="btn btn-success" onclick="handlePurchase(true)">Hoàn Thành</button>
                </div>
        </div>
    </div>
</div>
        <script>
            let products = [];
        let productId = 0;
        let totalPrice = 0; 
        const productForm = document.getElementById('product-form');
        const productName = document.getElementById('product-name');

        const productPrice = document.getElementById('product-price');
        const productQuantity = document.getElementById('product-quantity');
        const productTable = document.getElementById('product-table');
        const productTableBody = document.getElementById('product-table-body');

        // PHẦN THÔNG TIN THANH TOÁN
        const purchase_total = document.getElementById('purchase_total');
        const purchase_total_discount = document.getElementById('purchase_total_discount');
        const purchase_total_temp = document.getElementById('purchase_total_temp');
        const purchase_status = document.getElementById('purchase_status');
        const purchase_code = document.getElementById('purchase_code');
        const purchase_brand = document.getElementById('purchase_brand');
        function addProduct() {
            
            if (!productName.value || !productPrice.value || !productQuantity.value) {
                return;
            }
            const productCheck = products.find(p => p.product_code === productName.options[productName.selectedIndex].getAttribute('data-id'));
            if(productCheck){
                productCheck.quantity+=Number(productQuantity.value)
                productCheck.total+=Number(productPrice.value) * Number(productQuantity.value)
            }
            else{
                const product = {
                    id: ++productId,
                    product_code:productName.options[productName.selectedIndex].getAttribute('data-id'),
                    product_name: productName.value,
                    price: Number(productPrice.value),
                    quantity: Number(productQuantity.value),
                    total: Number(productPrice.value) * Number(productQuantity.value)
                };
                products.push(product);

            }

            renderProducts();
            productName.value = '';
            productPrice.value = '';
            productQuantity.value = '';
        }

        function editProduct(id) {
            const product = products.find(p => p.id === id);
            const row = productTable.querySelector(`[data-id="${id}"]`);

            row.innerHTML = `
			<td><input type="text" class="form-control input-td  product-category" value="${product.category}"></td>
            <td><input type="text" class="form-control input-td  product-price" value="${product.price}"></td>
            <td><input type="text" class="form-control input-td  product-quantity" value="${product.quantity}"></td>
            <td>${product.total}</td>
            <td>
                <button type="button" class="product-controls save-product" data-id="${id}">Lưu</button>
                <button type="button" class="product-controls cancel-product" data-id="${id}">Hủy</button>
            </td>
            `;
        }
        function saveProduct(id) {
		const product = products.find(p => p.id === id);
		const row = productTable.querySelector(`[data-id="${id}"]`);
		product.price = Number(row.querySelector('.product-price').value);
		product.quantity = Number(row.querySelector('.product-quantity').value);
		product.total = product.price * product.quantity;

		renderProducts();
	}

// 	function cancelProduct(id) {
// 		const product = products.find(p => p.id === id);
// 		const row = productTable.querySelector(`[data-id="${id}"]`);

// 		row.innerHTML = `
// 		<td>${product.category}</td>
// 		<td>${product.price}</td>
// 		<td>${product.quantity}</td>
// 		<td>${product.total}</td>
// 		<td>
// 			<button type="button" class="product-controls edit-product" data-id="${id}">Sửa</button>
// 			<button type="button" class="product-controls delete-product" data-id="${id}">Xóa</button>
// 		</td>
// 	`;
// }
function deleteProduct(id) {
	const index = products.findIndex(p => p.id === id);
	products.splice(index, 1);

	renderProducts();
}

function renderProducts() {
	productTableBody.innerHTML = `
		${products.map(product => `
			<tr data-id="${product.id}">
				<td>${product.product_code}</td>
				<td>${product.product_name}</td>
				<td class="text-end"><div class="d-flex justify-content-end"><input type="text" class="form-control input-td  product-price" onchange="saveProduct(${product.id})" value="${product.price}" ></div></td>
				<td class="text-end"><div class="d-flex justify-content-end"><input type="text" class="form-control input-td  product-quantity" onchange="saveProduct(${product.id})" value="${product.quantity}"></div></td>
				<td class="text-end">${product.total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</td>
				<td class="text-center">
                    <i class="bi bi-x-square text-danger cursor-pointer" onclick="deleteProduct(${product.id})"></i>
				</td>
			</tr>
		`).join('')}
	`;
    totalPrice = products.reduce((total, product) => total + product.total, 0);
	purchase_total_temp.innerText = totalPrice;
	purchase_total.innerText = totalPrice-Number(purchase_total_discount.value);
}

productForm.addEventListener('submit', event => {
	event.preventDefault();
	addProduct();
});

productTable.addEventListener('click', event => {
	if (event.target.classList.contains('edit-product')) {
		const id = Number(event.target.dataset.id);
		editProduct(id);
	} else if (event.target.classList.contains('save-product')) {
		const id = Number(event.target.dataset.id);
		saveProduct(id);
	} else if (event.target.classList.contains('cancel-product')) {
        const id = Number(event.target.dataset.id);
	cancelProduct(id);
} else if (event.target.classList.contains('delete-product')) {
	const id = Number(event.target.dataset.id);
	deleteProduct(id);
}
});

// CODE PHẦN CHỨC NĂNG NHẬP HÀNG
const handleCancel=()=>{
    products=[]
    purchase_total_discount.value=0
    renderProducts()
}
purchase_total_discount.onkeyup=()=>{
    if(totalPrice<Number(purchase_total_discount.value)){
        purchase_total.innerText=totalPrice
        return
    }
    purchase_total.innerText = totalPrice-Number(purchase_total_discount.value);
}
 const handlePurchase=(status=false)=>{
    $.post("http://127.0.0.1:8000/api/purchase", 
        {
            products,
            purchase_code:purchase_code.value,
            purchase_status:status,
            purchase_brand:purchase_brand.value,
            purchase_total:purchase_total.innerText
        }     
    ,
        function (data, textStatus, jqXHR) {
        },
        "json"
    )
        .done(function() {
            alert("Nhập hàng thành công");
            products=[]
            renderProducts()
        })
        .fail(function() {
            alert( "Nhập hàng thất bại" );
        })
 }
        </script>
        @endsection
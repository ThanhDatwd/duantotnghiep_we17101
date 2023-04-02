<!DOCTYPE html>
<html>

<head>
    <title>Nhập hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            padding: 16px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-header {
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
        }

        .product-info {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 10px;
        }

        .product-info input[type=text] {
            flex: 1;
            margin-right: 10px;
        }

        .product-info select {
            flex: 1;
        }

        .product-controls {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .product-controls button {
            background-color: #f44336;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            margin-right: 10px;
            cursor: pointer;
        }

        .product-controls button:hover {
            background-color: #dc3545;
        }

        .product-controls button.disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .product-controls button.add-product {
            background-color: #4CAF50;
        }

        .product-controls button.add-product:hover {
            background-color: #45a049;
        }

        .product-controls button.edit-product {
            background-color: #2196F3;

        }

        .additive-symbols .product-controls button.edit-product:hover {
            background-color: #1e87f0;
        }

        .product-controls button.save-product {
            background-color: #4CAF50;
        }

        .product-controls button.save-product:hover {
            background-color: #45a049;
        }

        .product-controls button.cancel-product {
            background-color: #ccc;
            color: #fff;
        }

        .product-controls button.cancel-product:hover {
            background-color: #b3b3b3;
        }
    </style>
</head>

<body>
    <h1>Nhập hàng</h1>
    <form id="product-form">
        <div class="product-info">
            <input type="text" id="product-name" placeholder="Tên sản phẩm">
            <select id="product-category">
                <option value="">--Chọn danh mục--</option>
                <option value="Điện thoại">Điện thoại</option>
                <option value="Máy tính">Máy tính</option>
                <option value="Thiết bị gia dụng">Thiết bị gia dụng</option>
            </select>
        </div>
        <div class="product-info">
            <input type="text" id="product-price" placeholder="Giá sản phẩm">
            <input type="text" id="product-quantity" placeholder="Số lượng">
            <button type="button" class="product-controls add-product" onclick="addProduct()">Thêm sản phẩm</button>
        </div>
    </form>
    <div class="container">
        <table id="product-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="total-price"></div>
    </div>
    <script>
        let products = [];
        let productId = 0;
        let totalPrice = 0; 
        const productForm = document.getElementById('product-form');
        const productName = document.getElementById('product-name');
        const productCategory = document.getElementById('product-category');
        const productPrice = document.getElementById('product-price');
        const productQuantity = document.getElementById('product-quantity');
        const productTable = document.getElementById('product-table');
        const totalDiv = document.getElementById('total-price');

        function addProduct() {
            
            if (!productName.value || !productCategory.value || !productPrice.value || !productQuantity.value) {
                return;
            }

            const product = {
                id: ++productId,
                name: productName.value,
                category: productCategory.value,
                price: Number(productPrice.value),
                quantity: Number(productQuantity.value),
                total: Number(productPrice.value) * Number(productQuantity.value)
            };

            products.push(product);

            renderProducts();

            productName.value = '';
            productCategory.value = '';
            productPrice.value = '';
            productQuantity.value = '';
        }

        function editProduct(id) {
            const product = products.find(p => p.id === id);
            const row = productTable.querySelector(`[data-id="${id}"]`);

            row.innerHTML = `
			<td><input type="text" class="product-name" value="${product.name}"></td>
			<td><input type="text" class="product-category" value="${product.category}"></td>
            <td><input type="text" class="product-price" value="${product.price}"></td>
            <td><input type="text" class="product-quantity" value="${product.quantity}"></td>
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

		product.name = row.querySelector('.product-name').value;
		product.category = row.querySelector('.product-category').value;
		product.price = Number(row.querySelector('.product-price').value);
		product.quantity = Number(row.querySelector('.product-quantity').value);
		product.total = product.price * product.quantity;

		renderProducts();
	}

	function cancelProduct(id) {
		const product = products.find(p => p.id === id);
		const row = productTable.querySelector(`[data-id="${id}"]`);

		row.innerHTML = `
		<td>${product.name}</td>
		<td>${product.category}</td>
		<td>${product.price}</td>
		<td>${product.quantity}</td>
		<td>${product.total}</td>
		<td>
			<button type="button" class="product-controls edit-product" data-id="${id}">Sửa</button>
			<button type="button" class="product-controls delete-product" data-id="${id}">Xóa</button>
		</td>
	`;
}
function deleteProduct(id) {
	const index = products.findIndex(p => p.id === id);
	products.splice(index, 1);

	renderProducts();
}

function renderProducts() {
	productTable.innerHTML = `
		<tr>
			<th>Tên sản phẩm</th>
			<th>Danh mục</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Tổng giá</th>
			<th>Thao tác</th>
		</tr>
		${products.map(product => `
			<tr data-id="${product.id}">
				<td>${product.name}</td>
				<td>${product.category}</td>
				<td>${product.price}</td>
				<td>${product.quantity}</td>
				<td>${product.total}</td>
				<td>
					<button type="button" class="product-controls edit-product" data-id="${product.id}">Sửa</button>
					<button type="button" class="product-controls delete-product" data-id="${product.id}">Xóa</button>
				</td>
			</tr>
		`).join('')}
	`;
    const totalPrice = products.reduce((total, product) => total + product.total, 0);
	totalDiv.innerText = totalPrice;
}
function saveProduct(id) {
	const product = products.find(p => p.id === id);
	const row = productTable.querySelector(`[data-id="${id}"]`);

	product.name = row.querySelector('.product-name').value;
	product.category = row.querySelector('.product-category').value;
	product.price = Number(row.querySelector('.product-price').value);
	product.quantity = Number(row.querySelector('.product-quantity').value);
	product.total = product.price * product.quantity;

	renderProducts();
}

function cancelProduct(id) {
	const product = products.find(p => p.id === id);
	const row = productTable.querySelector(`[data-id="${id}"]`);

	row.innerHTML = `
		<td>${product.name}</td>
		<td>${product.category}</td>
		<td>${product.price}</td>
		<td>${product.quantity}</td>
		<td>${product.total}</td>
		<td>
			<button type="button" class="product-controls edit-product" data-id="${id}">Sửa</button>
			<button type="button" class="product-controls delete-product" data-id="${id}">Xóa</button>
		</td>
	`;
}

function deleteProduct(id) {
	const index = products.findIndex(p => p.id === id);
	products.splice(index, 1);

	renderProducts();
}

function renderProducts() {
	productTable.innerHTML = `
		<tr>
			<th>Tên sản phẩm</th>
			<th>Danh mục</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Tổng giá</th>
			<th>Thao tác</th>
		</tr>
		${products.map(product => `
			<tr data-id="${product.id}">
				<td>${product.name}</td>
				<td>${product.category}</td>
				<td>${product.price}</td>
				<td>${product.quantity}</td>
				<td>${product.total}</td>
				<td>
					<button type="button" class="product-controls edit-product" data-id="${product.id}">Sửa</button>
					<button type="button" class="product-controls delete-product" data-id="${product.id}">Xóa</button>
				</td>
			</tr>
		`).join('')}
	`;

	const totalPrice = products.reduce((total, product) => total + product.total, 0);
	totalDiv.innerText = totalPrice;
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
</script>






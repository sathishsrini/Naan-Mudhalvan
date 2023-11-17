<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Details - Inventory Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Purchase Details</h1>
        <form id="purchaseForm">
            <!-- Example of 10 fake products -->
            <?php
            // Simulated product data (replace this with your actual product information)
            $products = array(
                array("id" => 1, "product_name" => "Product 1", "product_id" => "P1001", "quantity" => 15, "cost" => 10),
                array("id" => 2, "product_name" => "Product 2", "product_id" => "P1002", "quantity" => 20, "cost" => 15),
                // Add other products similarly
            );

            foreach ($products as $product) {
            ?>
            <div class="form-group">
                <label for="product_<?php echo $product['id']; ?>">
                    <input type="checkbox" id="product_<?php echo $product['id']; ?>" 
                           name="products[]" value="<?php echo $product['id']; ?>">
                    <?php echo $product['product_name']; ?>
                    (ID: <?php echo $product['product_id']; ?>, Quantity: <?php echo $product['quantity']; ?>, Cost: $<?php echo $product['cost']; ?>)
                </label>
            </div>
            <?php } ?>
            <button type="button" class="btn btn-primary" onclick="proceedToPayment()">Proceed to Payment</button>
        </form>
    </div>

    <script>
        function proceedToPayment() {
            const form = document.getElementById("purchaseForm");
            const checkedProducts = [...form.querySelectorAll('input[type="checkbox"]:checked')];
            const productIDs = checkedProducts.map(checkbox => checkbox.value);

            if (productIDs.length > 0) {
                window.location.href = `payment.html?products=${productIDs.join(",")}`;
            } else {
                alert("Please select at least one product to proceed.");
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

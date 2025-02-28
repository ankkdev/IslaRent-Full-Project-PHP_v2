<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar con Stripee</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <h1>Pago con Stripe</h1>
    <form id="payment-form" action="index.php" method="POST">
        <label for="amount">Cantidad a pagar (€):</label>
        <input type="number" id="amount" name="amount" min="1" step="0.01" value="<?php echo htmlspecialchars($_POST['amount']); ?>" required>
        <input type="hidden" id="reserva_id" name="reserva_id" value="<?php echo htmlspecialchars($_POST['reserva_id']); ?>">
        <div id="card-element"></div>
        <!--Campo oculto para almacenar el paymentMethod.id -->
        <input type="hidden" id="payment_method" name="payment_method">
        <button type="submit" id="submit-button">Pagar</button>
        <div id="payment-message"></div>
    </form>
    <script>
        //la API pública se obtiene de la plataforma Stripe totalmente gratis
        const stripe = Stripe('PUBLIC KEY');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            });
            if (error) {
                document.getElementById('payment-message').innerText = error.message;
                return;
            }
            document.getElementById('payment_method').value = paymentMethod.id;
            form.submit();
        });
    </script>
</body>

</html>
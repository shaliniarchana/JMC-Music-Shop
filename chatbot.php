<?php
session_start();

$conn = new mysqli("localhost", "root", "", "joy_music");



$user_msg = strtolower(trim($_POST['message'] ?? ''));
$user_id = $_SESSION['user_id'] ?? null;

// Helper function
function contains($text, $keywords) {
    foreach ($keywords as $word) {
        if (strpos($text, $word) !== false) return true;
    }
    return false;
}

// Get latest order
$latest_order = null;
if ($user_id) {
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC LIMIT 1");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $latest_order = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

// 🔐 Login / Account
if (contains($user_msg, ['login', 'sign in', 'signup', 'register', 'create account', 'password', 'profile'])) {
    echo "🔐 You can log in or register <a href='login.php'>here</a>. For password reset, use the 'Forgot Password' option on the login page."; exit;
}

// 👋 Greetings
if (contains($user_msg, ['hi', 'hello', 'hey', 'good morning', 'good evening'])) {
    echo "👋 Hi there! Welcome to JMC Music Corner 🎵<br>How can I help you today?"; exit;
}

// 💼 About Us
if (contains($user_msg, ['about', 'who are you', 'what is jmc', 'what is this site'])) {
    echo "🎵 JMC Music Corner is a Sri Lankan music shop offering quality instruments & accessories.<br><a href='aboutus.php'>Learn more</a>."; exit;
}

// 📞 Contact
if (contains($user_msg, ['contact', 'email', 'support', 'help center', 'reach you'])) {
    echo "📞 You can contact us <a href='ContactUs.php'>here</a> or email <b>support@joymusic.lk</b>"; exit;
}

// 🌐 Location / Store
if (contains($user_msg, ['where are you', 'store', 'location', 'address'])) {
    echo "📍 We’re an online shop based in Sri Lanka. We deliver islandwide!"; exit;
}

// 💳 Payment
if (contains($user_msg, ['payment', 'cash on delivery', 'cod', 'card', 'pay'])) {
    echo "💳 We accept Credit/Debit Cards and offer Cash on Delivery (COD) in Sri Lanka."; exit;
}

// 🚚 Delivery
if (contains($user_msg, ['delivery', 'shipping', 'how long', 'charges', 'delivery time'])) {
    echo "🚚 We deliver islandwide within 2–5 working days. Delivery charges may vary based on location."; exit;
}

// 🛒 Cart
if (contains($user_msg, ['cart', 'checkout', 'my cart', 'remove item'])) {
    echo "🛒 You can manage your cart by <a href='cart.php'>clicking here</a>."; exit;
}

// 🌙 Dark Mode
if (contains($user_msg, ['dark mode', 'light mode', 'night mode'])) {
    echo "🌓 You can toggle dark mode using the moon/sun icon on the site."; exit;
}

// 📋 Policies
if (contains($user_msg, ['return', 'refund', 'warranty', 'cancel order', 'damaged'])) {
    echo "📋 You can find our return/cancellation policy on the Terms page. Contact support if your item is damaged."; exit;
}

// 🧾 Order Tracking
if (contains($user_msg, ['track order', 'where is my order', 'order status'])) {
    if (!$user_id) {
        echo "🔒 Please <a href='login.php'>log in</a> to track your order."; exit;
    }
    if (!$latest_order) {
        echo "❌ No recent orders found in your account."; exit;
    }
    echo "📦 Order #{$latest_order['order_number']} is <b>{$latest_order['status']}</b>. Estimated delivery: <b>{$latest_order['estimated_delivery_date']}</b>"; exit;
}

// 📦 Order Info
if (contains($user_msg, ['last order', 'how much', 'total', 'cost', 'recent order', 'order details'])) {
    if (!$user_id || !$latest_order) {
        echo "🔒 Please log in to view your order details."; exit;
    }
    $total = number_format($latest_order['total_amount'], 2);
    echo "🧾 Last Order #{$latest_order['order_number']} placed on <b>{$latest_order['created_at']}</b>, Total: <b>LKR {$total}</b>"; exit;
	
	$date = date("F j, Y, g:i a", strtotime($latest_order['created_at']));
    echo "🧾 Last Order #{$latest_order['order_number']} placed on <b>$date</b>, Total: <b>LKR {$total}</b>";

}

// 🛍️ Show Products
if (contains($user_msg, ['products', 'shop', 'instruments', 'catalog', 'all items'])) {
    echo "🛍️ Explore all our products <a href='products.php'>here</a>."; exit;
}

// 🎸 Category-Based Product Search
$categories = ['headphones', 'speakers', 'pianos', 'guitars', 'microphones', 'electronic keyboards', 'drums', 'sound mixers', 'trumpets', 'violins', 'traditional instruments'];
foreach ($categories as $cat) {
    if (strpos($user_msg, strtolower($cat)) !== false) {
        echo "🎼 Browse our <b>$cat</b> collection <a href='products.php#$cat'>" . ucfirst($cat) . "</a>."; exit;
    }
}

// 🔍 Keyword Product Search (e.g., “cheap drums” or “price of violin”)
if (contains($user_msg, ['show me', 'price of', 'cheap', 'expensive', 'best', 'top rated'])) {
    $sql = "SELECT name, price FROM addproducts ORDER BY price ASC LIMIT 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "🎯 Here's what I found:<br>";
        while ($row = $result->fetch_assoc()) {
           echo "🎵 <b>" . htmlspecialchars($row['name']) . "</b> – LKR " . htmlspecialchars($row['price']) . "<br>";

        }
    } else {
        echo "❌ No matching products found.";
    }
    exit;
}

// ⭐ Review / Ratings
if (contains($user_msg, ['review', 'rate', 'rating'])) {
    echo "⭐ You can rate any product from the Products page. Go to a product and click the stars!"; exit;
}
// 🌟 Highest Rated Products
if (contains($user_msg, ['top rated', 'highest rated', 'best reviews', 'best rated', 'most stars', 'most reviewed'])) {
    $stmt = $conn->prepare("
        SELECT p.name, p.price, AVG(r.rating) AS avg_rating
        FROM addproducts p
        JOIN product_reviews r ON p.id = r.product_id
        GROUP BY p.id
        HAVING COUNT(r.id) >= 3
        ORDER BY avg_rating DESC
        LIMIT 3
    ");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "🌟 Here are some of our highest-rated products:<br><br>";
        while ($row = $result->fetch_assoc()) {
            echo "🎵 <b>{$row['name']}</b> – LKR {$row['price']} (⭐ " . round($row['avg_rating'], 1) . ")<br>";
        }
    } else {
        echo "😔 No reviews found yet to determine top-rated products.";
    }
    exit;
}
foreach ($categories as $cat) {
    if (strpos($user_msg, "top rated $cat") !== false || strpos($user_msg, "best $cat") !== false) {
        $stmt = $conn->prepare("
            SELECT p.name, p.price, AVG(r.rating) AS avg_rating
            FROM addproducts p
            JOIN product_reviews r ON p.id = r.product_id
            WHERE p.category = ?
            GROUP BY p.id
            ORDER BY avg_rating DESC
            LIMIT 3
        ");
        $stmt->bind_param("s", $cat);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            echo "🎸 Top-rated $cat:<br>";
            while ($r = $res->fetch_assoc()) {
                echo "🎵 <b>{$r['name']}</b> – LKR {$r['price']} (⭐ " . round($r['avg_rating'], 1) . ")<br>";
            }
        } else {
            echo "🙁 No highly rated $cat yet.";
        }
        exit;
    }
}
if (contains($user_msg, ['how do i leave a review', 'can i review', 'write a review'])) {
    echo "⭐ You can leave reviews on product pages after purchasing. Just click the stars and submit your feedback."; exit;
}


// 🧠 Smart Help
if (contains($user_msg, ['recommend', 'suggest', 'what should i buy', 'help me choose'])) {
    echo "🤖 Need help choosing? Tell me your budget or what kind of instrument you want."; exit;
}

// 🎁 Gift-related
if (contains($user_msg, ['gift', 'present', 'for birthday', 'good for kids'])) {
    echo "🎁 Gifting? Our beginner-friendly instruments are perfect for all ages. Try <a href='products.php#pianos'>pianos</a> or <a href='products.php#guitars'>guitars</a>."; exit;
}

// 🔄 Fallback
echo "🤖 I didn’t quite catch that. You can ask me about products, reviews, your orders, account help, or contact support.";

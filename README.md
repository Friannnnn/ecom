# Language Used : PHP 7.4 
# Frameworks : Bootstrap 5.3 AJAX

# System Name : Kaisermark Enterprise E-Commerce System 

# Color Palette
    - Gray Background (Body): #808080
    - Container Background: #f8f9fa
    - Navbar Background: #EDF0EF
    - Cart Button Background: #ffffff
    - Cart Button Border: #EDF0EF
    - Nav Link Hover and Active State: #808080 (same as body background)
    - Nav Link Text (Default): #000000 (black)
    - Cart Icon Color: #000000 (black)
    - Nav Link Hover Text: #ffffff (white)


# Use Case Diagram 
    Actors:
    - Customer
    - Administrator

    Use Cases:
    - Browse Products
    - Search Products
    - Add to Cart
    - View Cart
    - Checkout
    - Make Payment
    - View Order Status
    - View Notifications
    - Manage Products (admin)
    - Manage Orders (admin)
    - Add Admin (admin)
    - Push Notification (email if possible and sa web) (admin)


    Relationships:
    - Customer <- Browse Products
    - Customer <- Search Products
    - Customer <- Add to Cart
    - Customer <- View Cart
    - Customer <- Checkout
    - Customer <- Make Payment
    - Customer <- View Order Status
    - Customer <- View Notifications

    - Administrator <- Manage Products
    - Administrator <- Manage Orders
    - Administrator <- Add Admin
    - Administrator <- Push Notification(Sale, Delivery)

# Features to be added:
    - set up acc for new users

    - the system can check and estimate the delivery time based on how far the customer is

    - customer can choose the branch on where to order for faster delivery

    - admin can add other admins

    - login with google and register with google are different

    - add other login ways either phpmailer if available

    - add the red number on the cart to know how many products on cart

    - add wishlist if available pa (will have the button to "add to wishlist" if the product is out of stock and will notify the customer whenever the product is availble or email them if mailer works)

    - search should not follow overflow, instead the home button will refresh the home putting the user to the top and refreshes the products

    - admins can push notification (logic: there will be a table in db that stores the notification messages, the admin will push the notification to either all of the users if its a sale or announcement, and will push other notif like the parcel is delivered or on the courier
    )

    
    

# Categories of Product:
    toyohama generator
    fujihama generator
    makita grinder
    haina grinder
    kawasaki grasscutter
    



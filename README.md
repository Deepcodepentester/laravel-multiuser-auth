Laravel Multi-Guard Authentication System
A robust multi-guard authentication system built with Laravel supporting Admin, User, and Vendor roles. Each role has its own authentication guard, middleware protection, and dedicated dashboard.

<font color="Red">The PHP version for this project is 7.3 - 8.0 </font><br>
________________________________________
🚀 Features
•	Multi-guard authentication (Admin, User, Vendor)
•	Separate login & registration for each role
•	Role-based middleware protection
•	Independent dashboards
•	Secure session handling
•	Clean and scalable architecture
•	Easy to extend with additional roles
________________________________________
🛠 Tech Stack
•	Laravel
•	PHP
•	MySQL
•	Blade Templating Engine
•	Laravel Authentication Guards & Middleware
________________________________________
📂 Project Structure
app/
 ├── Http/
 │    ├── Controllers/
 │    ├── Middleware/
 ├── Models/
config/
 ├── auth.php
routes/
 ├── web.php
________________________________________
⚙️ Installation Instructions
Follow these steps to set up the project locally:
________________________________________
1️⃣ Clone the Repository
git clone https://github.com/Deepcodepentester/laravel-multiuser-auth.git cd laravel-multiuser-auth 
________________________________________
2️⃣ Install Dependencies
Make sure you have PHP, Composer, and MySQL installed.
run composer install 
________________________________________
3️⃣ Create Environment File
Copy the example environment file:
cp .env.example .env 
________________________________________
4️⃣ Configure Environment Variables
Open the .env file and update the following:
APP_NAME=LaravelMultiGuard
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
________________________________________
5️⃣ Generate Application Key
php artisan key:generate 
________________________________________
6️⃣ Run Migrations
php artisan migrate 
If you have seeders:
php artisan db:seed 
________________________________________
7️⃣ Serve the Application
php artisan serve 
Visit:
http://127.0.0.1:8000
________________________________________
🔐 Authentication Routes
Example route structure:
•	/admin/login
•	/admin/register
•	/register
•	/login
•	/vendor/login
•	/vendor/register
________________________________________
🧩 Guards Configuration
Guards are configured inside:
config/auth.php
Example guards:
•	admin
•	user
•	vendor
Each guard uses its own provider and model.
________________________________________
🏗 How It Works
•	Each role has a separate model.
•	Each guard authenticates using its own provider.
•	Middleware ensures only authorized roles access specific routes.
•	Sessions are maintained independently per guard.
________________________________________
📌 Future Improvements
•	Role & Permission management (RBAC)
•	API authentication (Sanctum/Passport)
•	Email verification
•	Password reset per guard
•	Admin role management panel
________________________________________
🤝 Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you'd like to change.
________________________________________
📄 License
This project is open-source and available under the MIT License.



# Component Catalog

This document will serve as the central registry for all reusable UI components, backend services, and data models within the project. Each entry should provide a clear, concise overview of the component's purpose, usage, and dependencies.

## Template for a New Component

---

---

**Component Name:** `get_db_connection`

**Type:** `Backend Service`

**Location:** `/Connections/db.php`

**Description:**
Establishes a secure database connection using PDO. It centralizes the connection logic, making it easier to manage and secure. It retrieves database credentials from environment variables for better security.

**Usage Example:**
```php
require_once('Connections/db.php');
$pdo = get_db_connection('my_database');
```

**Key Methods / Properties:**
- `get_db_connection(db_name)`: Returns a PDO connection object.

**Dependencies:**
- `PDO` PHP extension

---

**Component Name:** `get_dropdown_data`

**Type:** `Backend Service`

**Location:** `/Connections/db.php`

**Description:**
Fetches all the data required for the dropdown menus in the `insert.php` form. This function encapsulates all the database queries for populating dropdowns, making the form code cleaner and easier to maintain.

**Usage Example:**
```php
require_once('Connections/db.php');
$pdo = get_db_connection('my_database');
$dropdown_data = get_dropdown_data($pdo);
extract($dropdown_data);
```

**Key Methods / Properties:**
- `get_dropdown_data(pdo)`: Takes a PDO connection object and returns an associative array where each key corresponds to a dropdown menu's data.

**Dependencies:**
- `get_db_connection`

---

**Component Name:** `udata`

**Type:** `Data Model`

**Location:** `Database table`

**Description:**
The primary table for storing property data. It contains all the details about a property, including its location, type, price, and associated client information.

**Key Methods / Properties:**
- `code`: (Primary Key) Unique identifier for the property.
- `madena`: City where the property is located.
- `madena_other`: A field for a special case of a sub-city.
- `aqar_type`: Type of property (e.g., apartment, villa).
- `aqar_type_other`: A field for a special case of a sub-type.
- `namozg`: Model of the property.
- `amalya_type`: Type of operation (e.g., for sale, for rent).
- `tashteeb`: Finishing status.
- `marhala`: Phase.
- `status`: Current status of the property.
- `wow`, `ain`, `geem`: Fields for property classification.
- `door`: Floor number.
- `kmalyat`: Amenities.
- `property_heading`: A short description of the property.
- `details`: Detailed description of the property.
- `address`: The address of the property.
- `hadeka`: Garden area.
- `mbna_mesaha`: Building area.
- `ard_masaha`: Land area.
- `kest_modah`: Installment period.
- `aqd_total`: Total contract value.
- `matloob`: Required amount.
- `kest_year`: Annual installment.
- `madfoo`: Amount paid.
- `alover`: Over-price.
- `wadyaa`: Deposit.
- `nady`: Club fees.
- `meterprice`: Price per meter.
- `modah_ejar`: Rental period.
- `motabaqi`: Remaining amount.
- `estlam`: Delivery date.
- `hagz`: Reservation status.
- `notes`: Additional notes.
- `whatsapp`: Client's WhatsApp number.
- `cust_name`: Client's name.
- `laqab`: Client's title.
- `email`: Client's email.
- `telephone`: Client's telephone number.
- `mobile`: Client's mobile number.
- `masdr`: Source.
- `modkhel`: Data entry person.
- `remember`: Reminder flag.
- `momz`: Featured property flag.
- `officeid`: Marketing office ID.
- `update_date`: Last update date.
- `entry_date`: Entry date.
- `updater`: The user who last updated the record.
- `motabaa`: Follow-up notes.

**Dependencies:**
- `city` table (foreign key `cityname`)
- `aqar_type_t` table (foreign key `aqar_type_name`)
- `amalya_type_t` table (foreign key `amalya_type_name`)
- `tashteeb_t` table (foreign key `tashteeb_name`)
- `status_t` table (foreign key `status_name`)
- `marhala` table (foreign key `marhalaname`)
- `door` table (foreign key `doorname`)
- `namozg` table (foreign key `namozgname`)
- `viewvv` table (foreign key `viewname`)
- `laqab` table (foreign key `laqab_name`)
- `offices` table (foreign key `id`)

---

-- Таблица для хранения данных юридических лиц
CREATE TABLE
  companies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL, -- Полное наименование юридического лица
    address VARCHAR(255) NOT NULL, -- Адрес юридического лица
    rto_number CHAR(10) NOT NULL CHECK (rto_number REGEXP '^РТО \\d{6}$'), -- Номер из реестра туроператоров
    inn CHAR(10) UNIQUE NOT NULL, -- ИНН (10 цифр)
    kpp CHAR(9) NOT NULL, -- КПП (9 цифр)
    bank_account CHAR(20) NOT NULL, -- Расчетный счет (20 цифр)
    bank_name VARCHAR(255) NOT NULL, -- Наименование банка
    bic CHAR(9) NOT NULL, -- БИК (9 цифр)
    correspondent_account CHAR(20) NOT NULL, -- Корреспондентский счет (20 цифр)
    representative_name VARCHAR(255) NOT NULL, -- ФИО представителя
    phone_number CHAR(16) NOT NULL CHECK (
      phone_number REGEXP '^\\+7 \\d{3} \\d{3} \\d{2} \\d{2}$'
    ), -- Телефон (формат +7 ХХХ XXX XX XX)
    contact_email VARCHAR(255) NOT NULL, -- E-mail
    password_hash VARCHAR(255) NOT NULL, -- Хеш пароля
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

-- Таблица для хранения диспетчеров
CREATE TABLE
  dispatchers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inn CHAR(10) UNIQUE NOT NULL, -- ИНН (10 цифр)
    password_hash VARCHAR(255) NOT NULL, -- Хеш пароля
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

-- Таблица для маршрутов и остановок
CREATE TABLE
  IF NOT EXISTS routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    route_name VARCHAR(255) NOT NULL,
    start_point VARCHAR(255) NOT NULL,
    end_point VARCHAR(255) NOT NULL,
    distance_km DECIMAL(10, 2),
    travel_time INT, -- время в минутах
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

CREATE TABLE
  IF NOT EXISTS stops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    route_id INT,
    stop_name VARCHAR(255) NOT NULL,
    stop_location VARCHAR(255),
    arrival_time TIME,
    FOREIGN KEY (route_id) REFERENCES routes (id) ON DELETE CASCADE
  );

-- Таблица для хранения заявок на поездки
CREATE TABLE
  orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT NOT NULL,
    route_id INT NOT NULL,
    departure_date DATETIME NOT NULL,
    status ENUM ('upcoming', 'completed', 'canceled') DEFAULT 'upcoming',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (company_id) REFERENCES companies (id),
    FOREIGN KEY (route_id) REFERENCES routes (id)
  );
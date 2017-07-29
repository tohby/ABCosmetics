create database ABCosmetic;
use ABCosmetic;
drop database ABCosmetic;

create table Customer(
CustomerID char(5) primary key,
FirstName nvarchar(100),
lastName nvarchar(100),
email nvarchar(100),
phone int,
sex char(5),
[password] nvarchar(7)
);

create table Store(
storeID char(5) primary key,
[location] nvarchar(100),
email nvarchar(100)
);

create table Staff(
staffID char(5) primary key,
staffName nvarchar(100)
);

create table [Admin](
username nvarchar(100),
[password] nvarchar(100)
);

create table Category(
categoryID char(5) primary key,
categoryName char(100)
);

create table Product(
productID char(5) primary key,
categoryID char(5),
productName nvarchar(100),
quantity int,
price money,
productDetails nvarchar(500)
foreign key (categoryID) references Category(categoryID)
);

create table [Order](
orderID char(5) primary key,
CustomerId char(5),
staffID char(5),
orderDate date,
foreign key (CustomerID) references Customer(CustomerID),
foreign key (staffID) references Staff(staffID)
);

create table orderDetails(
productID char(5),
orderID char(5),
quantity int,
price money,
foreign key (orderID) references [Order](orderID),
foreign key (productID) references Product(productID)
);

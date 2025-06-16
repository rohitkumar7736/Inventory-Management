 ______________________________________________:-Table of php:-_____________________________________________________________

create database inventory;
use inventory;
1:- create table provider
       (
       id varchar(10),
       name varchar(40),
       address varchar(80)
);
2:-create table order1
(
id varchar(10),
date1 varchar(70)
);
3:- create table orderdetail
(
      id varchar(10),
      qty int(20),
       adate1 varchar(70),
       rdate1 varchar(70)
);
4:- create table transfer
(
      id varchar(10),
      qty int(20),
       Sdate1 varchar(70),
       Rdate1 varchar(70)
);
5:- create table product
(
id varchar(10),
barcode  varchar(30),
name  varchar(40),
desc1  varchar(40),
category  varchar(40),
qty int(20),
weight  varchar(40),
refrigerated  varchar(40)
);
6:-  create table customer
(
id varchar(10),
nm varchar(40),
address varchar(60)
);
7:-  create table delivery
(
id varchar(10),
status varchar(60)
);
8:- create table inventory
(
id varchar(10),
qtyavail int(10),
minstock int(10),
maxstock int(10)
);
9:-create table deliverydetails
(
id varchar(10),
qty int(10),
expdate varchar(60),
actdate varchar(60)
);
10:- create table warehouse
(
id varchar(10),
nm varchar(40),
isrefrigerated varchar(60)
);
11:- create table location
(
id varchar(10),
nm varchar(40),
address varchar(60)
);
12:-create table login
(
       id varchar(10),
       pwd varchar(40),
       counter int(10)
);
insert into login values('get','project',4);
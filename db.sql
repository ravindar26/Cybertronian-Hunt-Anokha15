use treasurehunt;
CREATE TABLE questions(
level_no int,
answer varchar(255),
score int,
hint varchar(255),
qname varchar(255),
primary key(level_no)
);


CREATE TABLE users(
	username varchar(255),    
	anokhaid varchar(255),
	score int,
	level_no int,
	date_time datetime,
	primary key(anokhaid)
);

insert into questions values(1,'d936a6cd57ea1e45519612d6a4b4aa55',10,'******* * ****','e3ef0601490c5b2cde0af91495de76d4.jpg');
insert into questions values(2,'fb2db303ccf128fb42e418cca1205cbe',10,'******* ********','76babcdb5bb8c4f7b1fad6edd19e1482.jpg');
insert into questions values(3,'eb2765750b445a35b86bb1ead2569121',10,'***** ******','3c3e3a23de966e3c2cef258f063b0231.jpg');
insert into questions values(4,'d34bb764c0e4df441cc5c144efb8aad3',10,'********','cd9f05b22d01cc23caed6f30ebf948aa.jpg');
insert into questions values(5,'9d1423bcb9b338ba517b6d7b9b88948a',10,'***********','8d70c77ccaefe9fcc44ef40961d55f68.jpg');
insert into questions values(6,'d6ab2d1e13f8df406cd8606c2948ca42',10,'********** *******','50b31747c114072a7616742093643e40.jpg');
insert into questions values(7,'df7b94fac0bd87a7ade2553c3b058542',10,'***** *********','c0b1fbfb3a2d6e65fad8b8f767d52fdf.jpg');
insert into questions values(8,'26d4aff3075589a74128586f1611cf67',10,'** *****','a67dfddf883b85f1c0254f3aa714e925.jpg');
insert into questions values(9,'b31ffe10fc51b2597fc9a74f4da7ce66',10,'************','972298e1730037cdc07dcad6d0aa7a97.jpg');
insert into questions values(10,'b897c5ba0b2fc57438d40cb6a1a9e68d',10,'******** ****','5cc6bc72e47be8eb4bbadcedeae230e6.jpg');
insert into questions values(11,'e039c28b33bc34b23c08b3073b0352fd',10,'**********','5d804d74d4e9e75ea28ab168055b4651.jpg');
insert into questions values(12,'a4a6a33a3c5fb414fef69b653c591e0a',10,'*******','452930ab887baaeedb82bedb52299158.jpg');
insert into questions values(13,'597ef0b33ee3cd19184a806997a17c9e',10,'****** ***','e68972f26972675d581b3e3ac14506d9.jpg');
insert into questions values(14,'80b88138a52118f4b9d93ebc7c941e11',10,'*****','cf7a98ae4bb5c9f80ab9ea995ed1e595.jpg');
insert into questions values(15,'bdcf5fc18e4f01990300ed0d0a306428',10,'**','474729e812f1de3bb5741d1bb15717c9.jpg');
insert into questions values(16,'a422a1256c3f74d64f317c1912cc8ac5',10,'*********','a59e238bd34414ded96173adfae7e38d.jpg');
insert into questions values(17,'3c75323e7cf0b9d32180fc9e214043bb',10,'******* *********','99a541b452791d39f85c8d13b2c517f5.jpg');
insert into questions values(18,'8bf2f59a30cb6dc8036ad5b0ecad295d',10,'*****','d205cdf733afa0da1b3a0911803237e9.jpg');
insert into questions values(19,'2596802134ce9bce9bb8df0af99869aa',10,'***********','73d2b3fad96119192b49b438c0901c85.jpg');
insert into questions values(20,'e9a528a27e8f13a1e95e4d0f5cac4bf0',10,'*** *** **** ******','339271106aefc873b2c17ae0b593f1f4.jpg');
insert into questions values(21,'bfeeb68058c1fdfbf1bf777e9c69f7f1',10,'***********','685a6b98771a43278876daefa9ce2cd5.jpg');
insert into questions values(22,'97b7813a43c26aadbbc76571b1bfb0ff',10,'******','8947f71c306b9937c236107bb9e9e919.jpg');
insert into questions values(23,'bedba54c1833902a41b1d3f747da2234',10,'*****','fac956a3dcac64d8909e09bc2a6922a6.jpg');
insert into questions values(24,'f211fb7cc4c2564cfb817b5de367bb1d',10,'* *****','79fe3b37d5ba48936e53737a93f023f7.jpg');
insert into questions values(25,'8280de3ef89855b206c1d74510deb424',10,'****','e610fda6313fcadc6ad241625a39a8e5.jpg');
insert into questions values(26,'75eb515de91948d35ddaded470518f9f',10,'***','21869fa316ecaaf9928152239419fb9a.jpg');
insert into questions values(27,'2f5a1ca402f8a5e9a37fdac933a1ac9c',10,'*','2f5a1ca402f8a5e9a37fdac933a1ac9c.jpg');



drop database if exists class;
create database class default character set utf8 collate utf8_general_ci;;
use class;

create table teacher(
    id int auto_increment primary key, 
	class varchar(200) not null, 
	teacher varchar(200) not null

);

create table class(
    id int auto_increment primary key, 
	class varchar(200) not null, 
	teacher varchar(200) not null,
    className varchar(200) not null

);

create table classDetail(
    id int auto_increment primary key, 
	className varchar(200) not null, 
	detail varchar(200) not null,
    price int not null

);

CREATE TABLE member (
    id int auto_increment primary key,
    memberName varchar(200) not null,
    region varchar(200) not null,
    phone varchar(200) not null,
    email varchar(200) not null,
    account varchar(200) not null,
    password varchar(200) not null

);

create table follow(
    memberID int,
    class_Name varchar(200)
);

create table purchase(
    purchase_id int not null,
    member_id int not null
);

create table purchaseDetail(
    order_id int not NULL,
    className varchar(200) not null,
    order_date DATE
);


insert into teacher values(null,'語文類','喬納森');
insert into teacher values(null,'音樂類','喬斯達');
insert into teacher values(null,'藝術類','承太郎');
insert into teacher values(null,'行銷類','仗助');
insert into teacher values(null,'程式類','喬魯諾');
insert into teacher values(null,'理財類','徐倫');


insert into class values(null,'語文類','喬納森','一起學中文~初級');
insert into class values(null,'語文類','喬納森','一起學中文~中級');
insert into class values(null,'語文類','喬納森','一起學中文~高級');
insert into class values(null,'語文類','喬納森','最愛學日文~初級');
insert into class values(null,'語文類','喬納森','最愛學日文~中級');
insert into class values(null,'語文類','喬納森','最愛學日文~高級');

insert into class values(null,'音樂類','喬斯達','鋼琴好簡單');
insert into class values(null,'音樂類','喬斯達','直笛好簡單');
insert into class values(null,'音樂類','喬斯達','小提琴好簡單');
insert into class values(null,'音樂類','喬斯達','爵士鼓好簡單');

insert into class values(null,'藝術類','承太郎','水彩入門');
insert into class values(null,'藝術類','承太郎','水彩進階');
insert into class values(null,'藝術類','承太郎','素描全集');

insert into class values(null,'行銷類','仗助','數據分析方法全解析');
insert into class values(null,'行銷類','仗助','GA全攻略');
insert into class values(null,'行銷類','仗助','EXCEL操作好簡單');
insert into class values(null,'行銷類','仗助','EXCEL進階必學技巧');

insert into class values(null,'程式類','喬魯諾','C從0到100');
insert into class values(null,'程式類','喬魯諾','PYTHON從0到100');
insert into class values(null,'程式類','喬魯諾','JAVA從0到100');
insert into class values(null,'程式類','喬魯諾','SQL從0到100');
insert into class values(null,'程式類','喬魯諾','HTML從0到100');

insert into class values(null,'理財類','徐倫','成為投資高手');
insert into class values(null,'理財類','徐倫','股票入門');
insert into class values(null,'理財類','徐倫','不可不知的理財觀念');


insert into classDetail values(null,'一起學中文~初級','認識中文的注音符號與搭配。',500);
insert into classDetail values(null,'一起學中文~中級','開始認識詞的各種用法。',500);
insert into classDetail values(null,'一起學中文~高級','開始造句，完成對談。',500);
insert into classDetail values(null,'最愛學日文~初級','認識五十音。',600);
insert into classDetail values(null,'最愛學日文~中級','基本對話與發音。',600);
insert into classDetail values(null,'最愛學日文~高級','開始造句，完成日常對談。',600);

insert into classDetail values(null,'鋼琴好簡單','多種練習，讓你成為超級鋼琴大師。',2000);
insert into classDetail values(null,'直笛好簡單','多種練習，讓你成為超級直笛大師。',1200);
insert into classDetail values(null,'小提琴好簡單','多種練習，讓你成為超級小提琴大師。',2000);
insert into classDetail values(null,'爵士鼓好簡單','多種練習，讓你成為超級爵士鼓大師。',2000);

insert into classDetail values(null,'水彩入門','學會調色與手法各種技巧。',600);
insert into classDetail values(null,'水彩進階','你將成為水彩大師。',1000);
insert into classDetail values(null,'素描全集','多種練習，包含各種技巧讓你成為素描專家。',1500);

insert into classDetail values(null,'數據分析方法全解析','帶你成為數據分析人。',1500);
insert into classDetail values(null,'GA全攻略','傳統與新版GA的差異與全功能導覽。',1500);
insert into classDetail values(null,'EXCEL操作好簡單','介紹所有常用的功能。',600);
insert into classDetail values(null,'EXCEL進階必學技巧','多種練習，你將成為EXCEL專家。',900);

insert into classDetail values(null,'C從0到100','多種練習，你將成為C專家。',1800);
insert into classDetail values(null,'PYTHON從0到100','多種練習，你將成為PYTHON專家。',1800);
insert into classDetail values(null,'JAVA從0到100','多種練習，你將成為JAVA專家。',1800);
insert into classDetail values(null,'SQL從0到100','多種練習，你將成為SQL專家。',1500);
insert into classDetail values(null,'HTML從0到100','多種練習，你將成為HTML專家。',1500);

insert into classDetail values(null,'成為投資高手','適合有基本功的投資新手，我將帶你進入全新的股票世界。',2000);
insert into classDetail values(null,'股票入門','介紹基本觀念，手把手操作第一支股票',1200);
insert into classDetail values(null,'不可不知的理財觀念','沒有這些觀念，別想賺大錢。',1800);


insert into member values(null,'小勳','台北','0961127328','123@gmail.com','123','123');
insert into member values(null,'小觀','台北','0900218238','456@gmail.com','456','456');
insert into member values(null,'小律','大陸','0912345678','789@gmail.com','789','789');


insert into follow values(1,'一起學中文~初級');
insert into follow values(2,'一起學中文~初級');
insert into follow values(3,'一起學中文~初級');














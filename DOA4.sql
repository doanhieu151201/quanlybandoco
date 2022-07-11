create database BTL_API

CREATE TABLE bills_ban (
  id varchar(50) primary key not null,
  id_kh varchar(50),
  name_kh nvarchar(250) ,
  date_order date,
  tong_tien float ,
  payment nvarchar(200) ,
  note nvarchar(500) ,
  constraint fk_hoadonban_khachhang foreign key(id_kh) references khach_hang(id)
) 


CREATE TABLE bills_nhap (
  id varchar(50) primary key not null,
  id_ncc varchar(50),
  id_nhanvien varchar(50),
  date_order date,
  tong_tien float,
  thanh_toan nvarchar(200) ,
  note nvarchar(500) ,
  
   
  constraint fk_billsnhap_nhacungcap foreign key(id_ncc) references nha_cung_cap(id),
  constraint fk_billsnhap_nhanvien foreign key(id_nhanvien) references nhan_vien(id)
)



CREATE TABLE bill_detail_ban (
  id varchar(50) primary key not null,
  id_bill_ban varchar(50),
  sp varchar(256) ,
  sl varchar(250) ,
  id_kh varchar(50),
  tong int 
  constraint fk_billdetailban_billsban foreign key(id_bill_ban) references bills_ban(id),
  constraint fk_billdetailban_khachhang foreign key(id_kh) references khach_hang(id),
) 



CREATE TABLE bill_detail_nhap (
  id varchar(50) primary key not null,
  id_bill_nhap varchar(50) ,
  id_sp varchar(50),
  sl int ,
  don_vi nvarchar(20) ,
  constraint fk_billdetailnhap_billsnhap foreign key(id_bill_nhap) references bills_nhap(id),
  constraint fk_billdetailnhap_sanpham foreign key(id_sp) references san_pham(id),
) 




CREATE TABLE khach_hang (
  id varchar(50) primary key not null,
  ten_kh nvarchar(100) ,
  email nvarchar(255)  ,
  dia_chi nvarchar(255) ,
  sdt varchar(20)  ,
  
  
) 


CREATE TABLE loai_sp (
  id varchar(50) primary key not null,
  tenloai nvarchar(100) ,
  image varchar(255) 
) 
INSERT [dbo].loai_sp (id, tenloai,image) VALUES (1, N'Coca-Cola','a')


CREATE TABLE news (
  id varchar(50) primary key not null,
  title nvarchar(200) ,
  content text ,
  image text ,
  
  
)



CREATE TABLE nhan_vien (
  id varchar(50) primary key not null,
  ten_nhanvien nvarchar(255),
  gioitinh nvarchar(10)  ,
  ngaysinh date ,
  quequan nvarchar(100)  ,
  sdt varchar(20)  ,
  email nvarchar(255)  ,
  capbac nvarchar(10)  ,
  
   
) 



CREATE TABLE nha_cung_cap (
  id varchar(50) primary key not null,
  ten_ncc nvarchar(100)  ,
  diachi_ncc text  ,
  email nvarchar(255)  ,
  sdt varchar(15)  ,

 

) 


CREATE TABLE san_pham (
  id varchar(50) primary key not null,
  name nvarchar(100) ,
  id_lsp varchar(50) ,
  id_ncc varchar(50) ,
  mota_sp text ,
  unit_price float,
  so_luong int ,
  image varchar(255) ,
  don_vi_tinh nvarchar(255) ,
  xem int ,
  constraint fk_sanpham_loaisp foreign key(id_lsp) references loai_sp(id),
  constraint fk_sanpham_nhacungcap foreign key(id_ncc) references nha_cung_cap(id),

) 


CREATE TABLE users (
  id varchar(50) primary key not null,
  users_name nvarchar(50) ,
  email nvarchar(255)  ,
  password varchar(255) ,

) 





CREATE TABLE chi_tiet_hdn (
  id varchar(50) primary key not null,
  id_hdn varchar(50) NOT NULL,
  id_lk varchar(50) NOT NULL,
  sl int NOT NULL,
  don_vi nvarchar(20) NOT NULL,

  constraint fk_chitiethdn_hoadonnhap foreign key(id_hdn) references hoa_don_nhap(id),
  constraint fk_chitiethdn_linhkien foreign key(id_lk) references linh_kien(id),
)
go

SET IDENTITY_INSERT loai_sp ON

--proc
--LoaiLinhKien
create proc getall_sp
as
	begin
	Select * from san_pham
	end
go

create proc addsp
 
 (
 @id varchar(50) ,
  @name nvarchar(100) ,
  @id_lsp  varchar(50) ,
  @id_ncc  varchar(50) ,
  @mota_sp text ,
  @unit_price float,
  @so_luong int ,
  @image varchar(255) ,
  @don_vi_tinh nvarchar(255) ,
  @xem int
)
as
	begin
		insert into san_pham
					([id]  ,
					  [name]  ,
					  [id_lsp]  ,
					  [id_ncc]  ,
					  [mota_sp] ,
					  [unit_price] ,
					  [so_luong] ,
					  [image],
					  [don_vi_tinh] ,
					  [xem] 
					)
					values
					( @id ,
					  @name  ,
					  @id_lsp  ,
					  @id_ncc ,
					  @mota_sp ,
					  @unit_price ,
					  @so_luong  ,
					  @image  ,
					  @don_vi_tinh ,
					  @xem 
					)
	end
go

create proc updsp
(
 @id varchar(50) ,
  @name nvarchar(100) ,
  @id_lsp  varchar(50) ,
  @id_ncc  varchar(50) ,
  @mota_sp text ,
  @unit_price float,
  @so_luong int ,
  @image varchar(255) ,
  @don_vi_tinh nvarchar(255) ,
  @xem int
  )
  as
  begin
  update san_pham set name=@name,id_lsp=@id_lsp,id_ncc=@id_ncc,mota_sp=@mota_sp,unit_price=@unit_price,so_luong=@so_luong,image=@image,don_vi_tinh=@don_vi_tinh,xem=@xem Where id=@id
  end
 
  create proc delesp
  ( @id varchar(50))
  as
  begin
  delete from san_pham where id=@id
  end


  create proc searchsp
  ( @id varchar(50))
  as
  begin
  select * from san_pham where id=@id
  end
 
  --LSP
create proc getall_lsp
as
	begin
	Select * from loai_sp
	end
go

create proc addlsp
 (
@id  varchar(50),
  @tenloai nvarchar(100) ,
  @image varchar(255) 
)
as
	begin
		insert into loai_sp
					([id]  ,
					  [tenloai],
					  [image]
					 
					)
					values
					( @id ,
					  @tenloai,
					  @image  
					)
	end
go


create proc updlsp
(
@id  varchar(50),
  @tenloai nvarchar(100) ,
  @image varchar(255) 
  )
  as
  begin
  update loai_sp set tenloai=@tenloai,image=@image Where id=@id
  end


  create proc delelsp
  ( @id varchar(50))
  as
  begin
  delete from loai_sp where id=@id
  end


  create proc searchlsp
  ( @id varchar(50))
  as
  begin
  select * from loai_sp where id=@id
  end
  




--NCC
create proc getall_ncc
as
	begin
	Select * from nha_cung_cap
	end
go

create proc addncc
 (
 @id  varchar(50) ,
  @ten_ncc nvarchar(100)  ,
  @diachi_ncc text  ,
  @email nvarchar(255)  ,
  @sdt varchar(15)  
)
as
	begin
		insert into nha_cung_cap
					([id]  ,
					  [ten_ncc]  ,
					  [diachi_ncc]  ,
					  [email]  ,
				
					  [sdt]
					 
					)
					values
					( @id ,
					  @ten_ncc ,
					  @diachi_ncc,
					  @email,
					  @sdt

					 
					)
	end
go
 

 create proc updncc
(
 @id  varchar(50) ,
  @ten_ncc nvarchar(100)  ,
  @diachi_ncc text  ,
  @email nvarchar(255)  ,
  @sdt varchar(15)  
  )
  as
  begin
  update nha_cung_cap set ten_ncc=@ten_ncc,diachi_ncc=@diachi_ncc,email=@email,sdt=@sdt Where id=@id
  end


  create proc delelncc
  ( @id varchar(50))
  as
  begin
  delete from nha_cung_cap where id=@id
  end


  create proc searchncc
  ( @id varchar(50))
  as
  begin
  select * from nha_cung_cap where id=@id
  end

  
  --nhanvien

  create proc getall_nv
as
	begin
	Select * from nhan_vien
	end
go

create proc addnv
 (
 @id  varchar(50) ,
 @ten_nhanvien nvarchar(255),
 @gioitinh nvarchar(10)  ,
 @ngaysinh date ,
  @quequan nvarchar(100)  ,
  @sdt varchar(20)  ,
  @email nvarchar(255)  ,
  @capbac nvarchar(10)  

)
as
	begin
		insert into nhan_vien
					([id]  ,
					  [ten_nhanvien]  ,
					  [gioitinh]  ,
					  [ngaysinh]  ,
					  [quequan],
					  [sdt],
					  [email],
					  [capbac]

					 
					)
					values
					(  @id   ,
						 @ten_nhanvien ,
						 @gioitinh   ,
						 @ngaysinh  ,
						  @quequan   ,
						  @sdt  ,
						  @email ,
						  @capbac  

					 
					)
	end
go
 

 create proc updnv
(
  @id  varchar(50) ,
 @ten_nhanvien nvarchar(255),
 @gioitinh nvarchar(10)  ,
 @ngaysinh date ,
  @quequan nvarchar(100)  ,
  @sdt varchar(20)  ,
  @email nvarchar(255)  ,
  @capbac nvarchar(10)  
  )
  as
  begin
  update nhan_vien set ten_nhanvien=@ten_nhanvien,gioitinh=@gioitinh,ngaysinh=@ngaysinh,quequan=@quequan,sdt=@sdt,email=@email,capbac=@capbac Where id=@id
  end


  create proc delelnv
  ( @id varchar(50))
  as
  begin
  delete from nhan_vien where id=@id
  end


  create proc searchnv
  ( @id varchar(50))
  as
  begin
  select * from nhan_vien where id=@id
  end


  --news


  
      create proc getall_news
as
	begin
	Select * from news
	end
go

create proc addnews
 (
 @id varchar(50)  ,
  @title nvarchar(200) ,
  @content text ,
  @image text 
)
as
	begin
		insert into news
					([id]  ,
					  [title]  ,
					  [content]  ,
					  [image]
					)
					values
					(  @id   ,
						 @title ,
						 @content  ,
						 @image 
					 
					)
	end
go
 

 create proc updnews
(
@id varchar(50)  ,
  @title nvarchar(200) ,
  @content text ,
  @image text 
  )
  as
  begin
  update news set title=@title,content=@content,image=@image Where id=@id
  end


  create proc delelnews
  ( @id varchar(50))
  as
  begin
  delete from news where id=@id
  end


  create proc searchnews
  ( @id varchar(50))
  as
  begin
  select * from news where id=@id
  end




  --user
     create proc getall_users
as
	begin
	Select * from users
	end
go

create proc addusers
 (
  @id varchar(50) ,
  @users_name nvarchar(50) ,
  @email nvarchar(255)  ,
  @password varchar(255) 
)
as
	begin
		insert into users
					([id]  ,
					  [users_name]  ,
					  [email],

					  [password]  
					)
					values
					(  @id   ,
						 @users_name ,
						 @email  ,
						 @password 
					 
					)
	end
go
 

 create proc updusers
(
 @id varchar(50) ,
  @users_name nvarchar(50) ,
  @email nvarchar(255)  ,
  @password varchar(255) 
  )
  as
  begin
  update users set users_name=@users_name,email=@email,password=@password Where id=@id
  end


  create proc delelusers
  ( @id varchar(50))
  as
  begin
  delete from users where id=@id
  end


  create proc searchusers
  ( @id nvarchar(50))
  as
  begin
  select * from users where id=@id
  end


  --Khach_hang

       create proc getall_kh
as
	begin
	Select * from khach_hang
	end
go

create proc addkh
 (
  @id varchar(50) ,
  @ten_kh nvarchar(100) ,
  @email nvarchar(255)  ,
  @dia_chi nvarchar(255) ,
  @sdt varchar(20)  
)
as
	begin
		insert into khach_hang
					([id]  ,
					  [ten_kh]  ,
					  [email],
					  [dia_chi] ,
					  [sdt] 

					)
					values
					(  @id   ,
						 @ten_kh ,
						 @email  ,
						 @dia_chi,
						 @sdt 
						 
					 
					)
	end
go
 

 create proc updkh
(
  @id varchar(50) ,
  @ten_kh nvarchar(100) ,
  @email nvarchar(255)  ,
  @dia_chi nvarchar(255) ,
  @sdt varchar(20)  
  )
  as
  begin
  update khach_hang set ten_kh=@ten_kh,email=@email,dia_chi=@dia_chi,sdt=@sdt Where id=@id
  end


  create proc delelkh
  ( @id varchar(50))
  as
  begin
  delete from khach_hang where id=@id
  end


  create proc searchkh
  ( @id nvarchar(50))
  as
  begin
  select * from khach_hang where id=@id
  end

  --BILL BAN



  
       create proc getall_billban
as
	begin
	Select * from bills_ban
	end
go

create proc addbillban
 (
  @id varchar(50) ,
  @id_kh varchar(50),
  @name_kh nvarchar(250) ,
  @date_order date,
  @tong_tien float ,
  @payment nvarchar(200) ,
  @note nvarchar(500) 
)

as
	begin
		insert into bills_ban
					([id]  ,
					  [id_kh]  ,
					  [name_kh],
					  [date_order] ,
					  [tong_tien] ,
					  [payment],
					  [note]



					)
					values
					(  @id  ,
					  @id_kh ,
					  @name_kh  ,
					  @date_order ,
					  @tong_tien  ,
					  @payment  ,
					  @note
						 
					 
					)
	end
go
 

 create proc updbillban
(
  @id varchar(50) ,
  @id_kh varchar(50),
  @name_kh nvarchar(250) ,
  @date_order date,
  @tong_tien float ,
  @payment nvarchar(200) ,
  @note nvarchar(500) 
  )
  as
  begin
  update bills_ban set id_kh=@id_kh,name_kh=@name_kh,date_order=@date_order,tong_tien=@tong_tien,payment=@payment,note=@note Where id=@id
  end

  create proc delelbillban
  ( @id varchar(50))
  as
  begin
  delete from bills_ban where id=@id
  end


  create proc searchbillban
  ( @id varchar(50))
  as
  begin
  select * from bills_ban where id=@id
  end


  --Bill nhap


   create proc getall_billnhap
as
	begin
	Select * from bills_nhap
	end
go

create proc addbillnhap
 (
   @id varchar(50) ,
  @id_ncc varchar(50),
  @id_nhanvien varchar(50),
  @date_order date,
  @tong_tien float,
  @thanh_toan nvarchar(200) ,
  @note nvarchar(500) 
)

as
	begin
		insert into bills_nhap
					([id]  ,
					  [id_ncc]  ,
					  [id_nhanvien],
					  [date_order] ,
					  [tong_tien] ,
					  [thanh_toan],
					  [note]



					)
					values
					(  @id  ,
					  @id_ncc ,
					  @id_nhanvien  ,
					  @date_order ,
					  @tong_tien  ,
					  @thanh_toan  ,
					  @note
						 
					 
					)
	end
go
 

 create proc updbillnhap
(
     @id varchar(50) ,
  @id_ncc varchar(50),
  @id_nhanvien varchar(50),
  @date_order date,
  @tong_tien float,
  @thanh_toan nvarchar(200) ,
  @note nvarchar(500) 
  )
  as
  begin
  update bills_nhap set id_ncc=@id_ncc,id_nhanvien=@id_nhanvien,date_order=@date_order,tong_tien=@tong_tien,thanh_toan=@thanh_toan,note=@note Where id=@id
  end



  create proc delelbillnhap
  ( @id varchar(50))
  as
  begin
  delete from bills_nhap where id=@id
  end

  create proc searchbillnhap
  ( @id varchar(50))
  as
  begin
  select * from bills_nhap where id=@id
  end


  --Detail Ban

   create proc getall_ctban
as
	begin
	Select * from bill_detail_ban
	end
go

create proc addctban
 (
   @id varchar(50) ,
  @id_bill_ban varchar(50),
  @sp nvarchar(256) ,
  @sl varchar(250) ,
  @id_kh varchar(50),
  @tong int 
)


as
	begin
		insert into bill_detail_ban
					([id]  ,
					  [id_bill_ban]  ,
					  [sp],
					  [sl] ,
					  [id_kh] ,
			
					  [tong]



					)
					values
					(   @id  ,
						  @id_bill_ban,
						  @sp  ,
						  @sl  ,
						  @id_kh ,
						  @tong  
						 
					 
					)
	end
go
 

 create proc updctban
(
     @id varchar(50) ,
  @id_bill_ban varchar(50),
  @sp nvarchar(256) ,
  @sl varchar(250) ,
  @id_kh varchar(50),
  @tong int 
  )
  as
  begin
  update bill_detail_ban set id_bill_ban=@id_bill_ban,sp=@sp,sl=@sl,id_kh=@id_kh,tong=@tong Where id=@id
  end


  create proc delelctban
  ( @id varchar(50))
  as
  begin
  delete from bill_detail_ban where id=@id
  end





  create proc searchctban
  ( @id varchar(50))
  as
  begin
  select * from bill_detail_ban where id=@id
  end


 -- CTNhap

    create proc getall_ctnhap
as
	begin
	Select * from bill_detail_nhap
	end
go

create proc addctnhap
 (
  @id varchar(50) ,
  @id_bill_nhap varchar(50) ,
  @id_sp varchar(50),
  @sl int ,
  @don_vi nvarchar(20) 
)


as
	begin
		insert into bill_detail_nhap
					([id]  ,
					  [id_bill_nhap]  ,
					  [id_sp],
					  [sl] ,
					  [don_vi] 



					)
					values
					(   @id  ,
					  @id_bill_nhap  ,
					  @id_sp,
					  @sl ,
					  @don_vi 

					 
					)
	end
go
 

 create proc updctnhap
(
      @id varchar(50) ,
  @id_bill_nhap varchar(50) ,
  @id_sp varchar(50),
  @sl int ,
  @don_vi nvarchar(20) 
  )
  as
  begin
  update bill_detail_nhap set id_bill_nhap=@id_bill_nhap,id_sp=@id_sp,sl=@sl,don_vi=@don_vi Where id=@id
  end


  create proc delelctnhap
  ( @id varchar(50))
  as
  begin
  delete from bill_detail_nhap where id=@id
  end





  create proc searchctnhap
  ( @id varchar(50))
  as
  begin
  select * from bill_detail_nhap where id=@id
  end









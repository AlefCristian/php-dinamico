create database sitedinamico;
use sitedinamico;

drop table if exists posts;
create table posts (
id int auto_increment primary key,
thumb text,
titulo text,
texto text,
categoria text,
data timestamp,
autor text ,
valor_real text ,
valor_pagseguro text,
visitas varchar(11));

drop table pagina;
create table pagina (
id int primary key auto_increment,
pagina text,
content text
);

drop table manu;
create table manu (
id int primary key auto_increment,
estatus text);

insert into manu (estatus) values ('ativo');
 

select * from manu;

insert into pagina (pagina, content) values ('nossos cursos','<h2>Bem vindo a UpProfissionais</h2>
        <p><a href="images/estudantes.jpg" rel="shadowbox"><img src="images/estudantes.jpg" alt="" class="alinright"></a>
         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a erat venenatis augue egestas dapibus id a metus. Curabitur quis mollis augue. Phasellus pretium porttitor pharetra.</p>
        
        <p>Proin diam mauris, elementum quis justo vitae, mollis pellentesque sem. Pellentesque consequat sem libero, at feugiat nisl malesuada sit amet. Vestibulum at ultricies odio, nec pharetra lorem. Vestibulum tristique enim quis risus convallis tincidunt.</p>
        
        <p>Proin diam mauris, elementum quis justo vitae, mollis pellentesque sem. Pellentesque consequat sem libero, at feugiat nisl malesuada sit amet. Vestibulum at ultricies odio, nec pharetra lorem. Vestibulum tristique enim quis risus convallis tincidunt.</p>
        
        <p>Proin diam mauris, elementum quis justo vitae, mollis pellentesque sem. Pellentesque consequat sem libero, at feugiat nisl malesuada sit amet. Vestibulum at ultricies odio, nec pharetra lorem. Vestibulum tristique enim quis risus convallis tincidunt.</p>
        
        <ul>
            <li>Lista 01</li>
            <li>Lista 02</li>
            <li>Lista 03</li>
        </ul>
        
        <ol>
            <li>Lista 01</li>
            <li>Lista 02</li>
            <li>Lista 03</li>
        </ol>
        
        <p>Nunc vitae est commodo lacus rutrum consectetur. Donec facilisis neque at arcu congue, non mollis nisl iaculis. Suspendisse dignissim porttitor mauris. Phasellus maximus hendrerit blandit.
        </p>
        
        <a href="#">Link 01</a>
        
        <blockquote>Nunc vitae est commodo lacus rutrum consectetur. Donec facilisis neque at arcu congue, non mollis nisl iaculis. Suspendisse dignissim porttitor mauris. Phasellus maximus hendrerit blandit.</blockquote>'
        );
select id, pagina, content from pagina;

ALTER table posts CHARSET = UTF8 COLLATE = utf8_general_ci;

create table users (
id int primary key auto_increment,
usuario text not null,
senha text not null,
nome text not null,
nivel text,
email text);

insert into users (usuario, senha, nome, nivel, email) values ('admin', 'admin', 'Alef Cristian', 'admin', 'alef@myslq');

select * from users;
select * from posts where categoria = 'produtos' order by id desc;

select * from posts where categoria = 'cursos';
select id from posts where categoria = 'cursos';

select thumb, titulo, texto, categoria, 'data', autor, valor_real, valor_pagseguro from posts;
insert into posts 
(thumb, titulo, texto, categoria, autor, valor_real, valor_pagseguro) 
values (
'02.jpg',
'Ipsum lorem dolor sit amet 02',
'Consectetur quis vel risus. Etiam ut molestie arcu.',
'produtos',
'Alef',
'55,90',
'');
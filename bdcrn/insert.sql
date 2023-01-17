insert into chronos.empresas (razaosocial, cnpj, nome_empresa, email, cidade, tipo_logradouro, logradouro, numero, bairro)
					   values('Smaniotto&Smaniotto LTDA', '17.625.455/0001-03', 'CPE - Centro Profissionalizante Educacional', 'atendimento@cpe.com.br', 'Marília', 'Rua', 'Odorico Alves', '61', 'Jardim Edson Lima' );
                       
insert into telefones (telefone, idempresa)
				values('(27)98084-3876', 1),
					  ('(27)98731-3765', 1);
                      
insert into salas (tipo_sala, descricao, capacidade, disponivel, data_cadastro, idempresa)
			values('Laboratório de Informática', 'Sala 7-B', 20, 1, current_timestamp(), 1),
				  ('Sala de Aula', 'Sala 5', 25, 1, current_timestamp(), 1);
                  
insert into cursos (nome_curso, data_cadastro)
			 values('Desenvolvimento WEB', current_timestamp()),
				   ('PHP com MySQL', current_timestamp());
                   
insert into turmas (data_inicio, data_fim, idsala, idcurso, data_cadastro)
			 values('2023-01-15', '2023-10-01', 1, 1, current_timestamp());
             
insert into usuarios (nome, data_nascimento, cpf, email, senha, ra_aluno, tipo_usuario, foto, situacao, data_cadastro)
			   values('Rosane Pimenta Giacomini', '2008-03-10', '07647222392', 'rosane.giacomini@geradornv.com.br', 'pwD8st8I1!NX', null, 1, null, 1, current_timestamp()),
					 ('Luiza Marins Machado', '2008-04-04', '68293276282', 'luiza.machado@geradornv.com.br', ')vD93Vklr%In', '339170220', 3, null, 1, current_timestamp()),
                     ('Leandro Mendonça Veiga', '2010-08-19', '10862247870', 'leandro.veiga@geradornv.com.br', 'px*h#Dwg=!wm', '193016825', 3, null, 1, current_timestamp());
                     
insert into usuario_turma (idusuario, idturma)
 				    values(1, 1),
					      (2, 1),
                          (3, 1);
insert into grupos (nome_grupo, descricao, data_criacao)
			 values('Equipe Chornos', null, current_timestamp());

insert into grupo_usuario_turma (idusuario_turma, idgrupo)
						  values(1, 1),
								(2, 1),
                                (3, 1);

insert into categorias (nome_categoria, data_cadastro)
				 values('Técnologia da Informação', current_timestamp());
                                
insert into projetos (nome_projeto, descricao, objetivo, data_criacao, data_entrega, situacao, arquivo, idcategoria, idgrupo, data_cadastro)
			   values('Chronos', 'Projeto de sistema para gestão e publicação de projetos escolares', 'Promover a interação entre os alunos...', current_date(), null, 1, null, 1, 1, current_timestamp());
               
insert into atividades_projeto (titulo, descricao, data_criacao, data_entrega, urgencia, status, prioridade, idprojeto)
						 values('Cadastro de Usuários', 'Desenvolver a função de cadastrar usuários em PHP', current_timestamp(), null, 1, 1, 1, 1);
                         
insert into midias (tipo_midia, caminho, data_cadastro, idatividade)
			 values('Vídeo', 'C:/projeto/videos', current_timestamp(), 1);
             
insert into etapas_projetos (titulo, descricao, status, data_inicio, data_fim, idprojeto, idmidias)
					  values('Introdução', 'Este projeto foi desenvolvido para...', 1, '2023-02-01', '2023-08-10', 1, null);
                      
                      
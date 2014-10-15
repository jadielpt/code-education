Comandos GIT
============

**Obs: Não use sem prévio conhecimento básico!**

Ver o status
>git status

Adicionando um arquivo
>git add (nome do arquivo) 

Adicionando todos os arquivos ao mesmo tempo
>git add .

Voltando ao estágio anterior do adicionamento
>git reset HEAD (nome do arquivo)

Commit - Comitando
>git commit -m "mensagem de commit"

Adicionando e comitando ao mesmo tempo
>git commit -a -m "mensagem de commit"

Voltando commit a versões anteriores
Voltar um commit
>git reset HEAD~1
Voltar dois commit
>git reset HEAD~2
Assim por diante...

Voltando um commit e deixando o arquivo no estagio anterior
>git reset HEAD~1 --soft

Voltando um commit e excluindo o arquivo, deixando no estágio anterior
>git reset HEAD~1 --hard

Verificando todos os commits
>git log

Verificando o que foi mudado, diferença entre um arquivo e outro
>git log -p

Verificando os 2 últimos commits
>git log -p -2

Mostrando as estatísticas de todos os commits
>git log --stat

Mostrando todos os commits, cada um em uma linha
>git log --pretty=oneline

Mostrando todos os commits dos últimos 2 dias até o momento atual
>git log --since=2.days

Criando um branch - uma ramificação
>git ckeckout -b (nome do branch)

Verificando em que branch você está
>git branch

Voltando para o branch master
>git ckeckout master

Grudando o branch criado no branch master
Entre como branch master
>git merge (nome do branch que vc criou)

Grudando o branch criado no branch master sem o commit
Somente localmente - localhost
Entre como branch master
>git rebase (nome do branch que vc criou)

Removendo um branch
>git branch -D (nome do branch)

Vendo branchs remotos
git branch -a

Mostrando o inicio do hash, quem comitou, quanto tempo atrás, mensagem: descrição do commit
>git log --pretty=format: "%h - %an, %ar : %s"

Deletando arquivos
>git rm (nome_do_arquivo)

Deletando todos os aquivos removidos ao mesmo tempo
>git ls-files --deleted | xargs git rm

Ignorando arquivos
Crie um arquivo chamado .gitignore
Digite o caminho da(s) pasta(s) ou arquivo(s) a ser ignorado
Cada arquivo em uma linhas
Salve!
Adicione o arquivo. Obs: Código já mostrado anteriormente

Criando um clone do github
>git clone (url do arqyuivo)

Fazendo um clone de outros branchs
>git ckeckout -b (nome do branch) origin/ (nome do branch)

Trazendo, puxando as alterações feitas por outros usuários
>git pull origin master

Sincronizando tudo que está no repositório remoto
>git pull

Enviando o(s) projeto(s), arquivo(s) para o repositório - github
>git push origin

Enviando um branch para o repositório - github
>git push origin (nome do branch)

Criando tags
>git tag (versão da tag) 

Listando tags
>git tag -l

Enviando a tag para o repositório - github
>git push origin master --tags

Removendo as tags criadas
Removendo tag localmente
>git tag -d 0.1.0
Removendo tag no repositório remoto
>git push origin :refs/tags/0.1.0

Criando um repositório local
Crie uma pasta e entre nela
>git init --bare
Saia da pasta
>git checkout master 
>git push local

*Lembrando que todos os processos de criar pastas ou arquivos, sair e entrar em pastas, devem ser feitos pelo bash, ou se gostar, mas não aconselho, pelo prompt de comando do windows.*
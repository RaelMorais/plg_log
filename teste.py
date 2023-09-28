import os
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email import encoders

# Configurações do e-mail
remetente = "mycone"
senha = "senha_do_remetente"
destinatario = "destinatario@example.com"
assunto = "Envio de arquivo"
mensagem = "Olá, aqui está o arquivo que você solicitou."

# Obter o caminho do arquivo na mesma pasta que o script
pasta_atual = os.path.dirname(os.path.realpath(__file__))
arquivo = os.path.join(pasta_atual, "relatorio_28092023.xlsx")
nome_arquivo = "relatorio_28092023.xlsx"

# Criar mensagem multipart
msg = MIMEMultipart()
msg['From'] = remetente
msg['To'] = destinatario
msg['Subject'] = assunto

# Corpo da mensagem
msg.attach(MIMEText(mensagem, 'plain'))

# Anexo
with open(arquivo, "rb") as anexo:
    part = MIMEBase('application', 'octet-stream')
    part.set_payload((anexo).read())
    encoders.encode_base64(part)
    part.add_header('Content-Disposition', "attachment; filename= %s" % nome_arquivo)
    msg.attach(part)

# Conectar e enviar o e-mail
try:
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.starttls()
    server.login(remetente, senha)
    texto = msg.as_string()
    server.sendmail(remetente, destinatario, texto)
    server.quit()
    print("E-mail enviado com sucesso!")
except Exception as e:
    print("Erro ao enviar o e-mail:", str(e))

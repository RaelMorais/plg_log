import os
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email import encoders

# Configurações do e-mail
host = 'smtp.gmail.com'
port = 587
login = 'etecprojetotcc1@gmail.com'
senha = 'etec2023'

# Cria uma instância do servidor SMTP
server = smtplib.SMTP(host, port)
server.ehlo()
server.starttls()
server.login(login, senha)

# Configurações do e-mail
corpo = 'Teste de envio automático'
email_msg = MIMEMultipart()
email_msg['From'] = 'etecprojetotcc1@gmail.com'  # Quem está enviando o e-mail
email_msg['To'] = 'mycone10@gmail.com'  # Quem deve receber o e-mail
email_msg['Subject'] = 'Relatório'
email_msg.attach(MIMEText(corpo, 'plain'))

# Obter o caminho do arquivo na mesma pasta que o script
pasta_atual = os.path.dirname(os.path.realpath(__file__))
diretorio_Relatorio = os.path.join(pasta_atual, 'Relatorios')
arquivo = os.path.join(diretorio_Relatorio, "relatorio_28092023.xlsx")
nome_arquivo = "relatorio_28092023.xlsx"

# Anexar o arquivo ao e-mail
with open(arquivo, "rb") as anexo:
    part = MIMEBase('application', 'octet-stream')
    part.set_payload(anexo.read())
    encoders.encode_base64(part)
    part.add_header('Content-Disposition', f"attachment; filename={nome_arquivo}")
    email_msg.attach(part)

# Conectar e enviar o e-mail
try:
    server.sendmail(login, email_msg['To'], email_msg.as_string())
    server.quit()
    print("E-mail enviado com sucesso!")
except Exception as e:
    print("Erro ao enviar o e-mail:", str(e))

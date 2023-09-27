import mysql.connector
import csv

# Conectar ao banco de dados MySQL
conexao = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='plg_log',
)

cursor = conexao.cursor()

SQL = f'SELECT DISTINCT pallets.autor, pallets.codigo, pallets.data, movimentacao.movimentacao, movimentacao.pallet1, movimentacao.pallet2, movimentacao.pallet3, movimentacao.pallet4, movimentacao.pallet5, movimentacao.pallet6 FROM pallets JOIN movimentacao ON pallets.id_movimentacao = movimentacao.id'
cursor.execute(SQL)
result = cursor.fetchall()

# Criar um arquivo CSV para o relatório
with open('relatorio.csv', 'w', newline='') as csvfile:
    fieldnames = ['Autor', 'Código', 'Data', 'Movimentação', 'Pallet1', 'Pallet2', 'Pallet3', 'Pallet4', 'Pallet5', 'Pallet6']
    writer = csv.DictWriter(csvfile, fieldnames=fieldnames)

    # Escrever o cabeçalho do CSV
    writer.writeheader()

    # Escrever os dados no CSV
    for row in result:
        autor, codigo, data, movimentacao, pallet1, pallet2, pallet3, pallet4, pallet5, pallet6 = row
        writer.writerow({
            'Autor': autor,
            'Código': codigo,
            'Data': data,
            'Movimentação': movimentacao,
            'Pallet1': pallet1,
            'Pallet2': pallet2,
            'Pallet3': pallet3,
            'Pallet4': pallet4,
            'Pallet5': pallet5,
            'Pallet6': pallet6
        })

print("Relatório gerado com sucesso!")

cursor.close()
conexao.close()
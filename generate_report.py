import mysql.connector
import csv
import os

conexao = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='plg_log',
)

cursor = conexao.cursor()

SQL_movimentacao = f'SELECT DISTINCT pallets.autor , pallets.codigo, pallets.data, movimentacao.movimentacao, movimentacao.pallet1, movimentacao.pallet2, movimentacao.pallet3, movimentacao.pallet4, movimentacao.pallet5, movimentacao.pallet6 FROM pallets JOIN movimentacao ON pallets.id_movimentacao = movimentacao.id'
cursor.execute(SQL_movimentacao)
result_movimentacao = cursor.fetchall()

SQL_produto = 'SELECT codigo, nome, modelo, descricao, custo, lucro, preco, volume FROM produtos;'
cursor.execute(SQL_produto)
result_produto = cursor.fetchall()

# Obtenha o diretório atual do script
diretorio_script = os.path.dirname(os.path.abspath(__file__))

# Caminhos relativos aos relatórios
caminho_relatorio_movimentacao = os.path.join(diretorio_script, 'Relatorios/CSV/relatorio_movimentacao.csv')
caminho_relatorio_produto = os.path.join(diretorio_script, 'Relatorios/CSV/relatorio_produto.csv')
print(caminho_relatorio_movimentacao)

with open(caminho_relatorio_movimentacao, 'w', newline='') as csvfile:
    fieldnames = ['Responsavel', 'Codigo Pallet', 'Data', 'Movimentacao', 'Pallet1', 'Pallet2', 'Pallet3', 'Pallet4', 'Pallet5', 'Pallet6']
    writer = csv.DictWriter(csvfile, fieldnames=fieldnames)
    
    writer.writeheader()

    for row in result_movimentacao:
        responsavel, codigo_pallet, data, movimentacao, pallet1, pallet2, pallet3, pallet4, pallet5, pallet6 = row
        writer.writerow({
            'Responsavel': responsavel,
            'Codigo Pallet': codigo_pallet,
            'Data': data,
            'Movimentacao': movimentacao,
            'Pallet1': pallet1,
            'Pallet2': pallet2,
            'Pallet3': pallet3,
            'Pallet4': pallet4,
            'Pallet5': pallet5,
            'Pallet6': pallet6
        })

with open(caminho_relatorio_produto, 'w', newline='') as csvfile:
    fieldnames_produto = ['Codigo', 'Nome', 'Modelo', 'Descricao', 'Custo', 'Lucro', 'Preco', 'Volume']
    writer = csv.DictWriter(csvfile, fieldnames=fieldnames_produto)
    writer.writeheader()

    for row_produto in result_produto:
        codigo, nome, modelo, descricao, custo, lucro, preco, volume = row_produto
        writer.writerow({
            'Codigo': codigo,
            'Nome': nome,
            'Modelo': modelo,
            'Descricao': descricao,
            'Custo': custo,
            'Lucro': lucro,
            'Preco': preco,
            'Volume': volume
        })

print("Relatórios gerados com sucesso!")

cursor.close()
conexao.close()
import pandas as pd
import matplotlib.pyplot as plt
import xlsxwriter
import io

# Ler o arquivo CSV com encoding 'latin1'
df = pd.read_csv('relatorio.csv', encoding='latin1')

# Separar movimentações em entrada e saída
entrada = df[df['Movimentação'] == 1]
saida = df[df['Movimentação'] == 2]

# Agrupar os dados por código de produto e somar as quantidades para entrada e saída
entrada_grouped = entrada.groupby('Código')[['Pallet1', 'Pallet2', 'Pallet3', 'Pallet4', 'Pallet5', 'Pallet6']].sum()
saida_grouped = saida.groupby('Código')[['Pallet1', 'Pallet2', 'Pallet3', 'Pallet4', 'Pallet5', 'Pallet6']].sum()

# Combinar os dataframes de entrada e saída
merged = pd.merge(entrada_grouped, saida_grouped, on='Código', how='outer').fillna(0)

# Calcular a quantidade total de movimentação (entrada - saída)
merged['Total'] = merged['Pallet1_x'] + merged['Pallet2_x'] + merged['Pallet3_x'] + merged['Pallet4_x'] + merged['Pallet5_x'] + merged['Pallet6_x'] - \
                 (merged['Pallet1_y'] + merged['Pallet2_y'] + merged['Pallet3_y'] + merged['Pallet4_y'] + merged['Pallet5_y'] + merged['Pallet6_y'])

# Calcular a quantidade total de entrada e saída
merged['Total_Entrada'] = merged['Pallet1_x'] + merged['Pallet2_x'] + merged['Pallet3_x'] + merged['Pallet4_x'] + merged['Pallet5_x'] + merged['Pallet6_x']
merged['Total_Saída'] = merged['Pallet1_y'] + merged['Pallet2_y'] + merged['Pallet3_y'] + merged['Pallet4_y'] + merged['Pallet5_y'] + merged['Pallet6_y']

# Criar um gráfico de barras empilhadas
plt.figure(figsize=(10, 6))
plt.bar(merged.index, merged['Total_Entrada'], color='green', label='Entrada')
plt.bar(merged.index, merged['Total_Saída'], color='red', label='Saída', bottom=merged['Total_Entrada'])
plt.xlabel('Código do Produto')
plt.ylabel('Quantidade de Movimentação')
plt.title('Quantidade de Movimentação por Código de Produto')
plt.xticks(rotation=45)  # Rotaciona os rótulos do eixo x para melhor legibilidade
plt.legend()

# Salvar o gráfico como uma imagem em memória
img_buf = io.BytesIO()
plt.tight_layout()
plt.savefig(img_buf, format='png')
img_buf.seek(0)

# Criar um arquivo XLSX com os dados e o gráfico
with pd.ExcelWriter('relatorio_com_grafico.xlsx', engine='xlsxwriter') as writer:
    df.to_excel(writer, sheet_name='Relatório', index=False)
    worksheet = writer.sheets['Relatório']

    # Inserir o gráfico na planilha XLSX
    chart = writer.book.add_chart({'type': 'column'})
    chart.add_series({'categories': f'=Relatório!$A$2:$A{len(merged) + 1}',
                      'values': f'=Relatório!$B$2:$B{len(merged) + 1}',
                      'name': 'Entrada'})
    chart.add_series({'categories': f'=Relatório!$A$2:$A{len(merged) + 1}',
                      'values': f'=Relatório!$C$2:$C{len(merged) + 1}',
                      'name': 'Saída'})

    chart.set_title({'name': 'Quantidade de Movimentação por Código de Produto'})
    chart.set_x_axis({'name': 'Código do Produto'})
    chart.set_y_axis({'name': 'Quantidade de Movimentação'})

    worksheet.insert_chart('E2', chart)

    # Inserir o gráfico como uma imagem na planilha XLSX
    image_sheet = writer.book.add_worksheet('Gráfico')
    image_sheet.insert_image('A2', 'grafico.png', {'x_offset': 5, 'y_offset': 5})

print("Relatório com gráfico gerado e salvo como relatorio_com_grafico.xlsx!")

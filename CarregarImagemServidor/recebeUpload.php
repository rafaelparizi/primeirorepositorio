<?php
//Upload de arquivo
if(isset($_FILES['arquivo']['name'])&& $_FILES["arquivo"]["error"]==0){
	echo "Voc� enviou o arquivo: ".$_FILES['arquivo']['name'];
	echo "<br>Este arquivo � do tipo: ".$_FILES['arquivo']['type'];
	echo  "<br>Foi salvo temporariamente em: ".$_FILES['arquivo']['tmp_name'];
	echo "<br>Seu tamanho �: ".$_FILES['arquivo']['size']." Bytes";
	
	
	$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
	$nome = $_FILES['arquivo']['name'];
	 
	// Pega a extensao
	$extensao = strrchr($nome, '.');
	
	// Converte a extensao para minusculo
	$extensao = strtolower($extensao);
	
	// Somente imagens, .jpg;.jpeg;.gif;.png
	// Aqui eu enfilero as extes�es permitidas e separo por ';'
	// Isso server apenas para eu poder pesquisar dentro desta String
	if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
	{
		// Cria um nome �nico para esta imagem
		// Evita que duplique as imagens no servidor.
		$novoNome = "rafael" . $extensao;
		 
		// Concatena a pasta com o nome
		$destino = 'imagens/' . $novoNome;
		 
		// tenta mover o arquivo para o destino
		if( @move_uploaded_file( $arquivo_tmp, $destino  ))
		{
			echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
			echo "<img src='".$destino."'/>";
		}
		else
			echo "Erro ao salvar o arquivo. Aparentemente voc� n�o tem permiss�o de escrita.<br />";
	}
	else{
		echo "Voc� poder� enviar apenas arquivos *.jpg;*.jpeg;*.gif;*.png<br/>";
	}
	
}else
	{
		echo "Voc� n�o enviou nenhum arquivo!";
	}
	

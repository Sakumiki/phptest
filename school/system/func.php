<?php

/**
 * ���O�C����Ԃɂ���ă��_�C���N�g���s��session_start�̃��b�p�[�֐�
 * ���񎞂܂��͎��s���ɂ̓w�b�_�𑗐M����exit����
 */
function require_unlogined_session()
{
    // �Z�b�V�����J�n
    @session_start();
    // ���O�C�����Ă���� / �ɑJ��
    if (isset($_SESSION['username'])&&isset($_SESSION['id'])) {
        header('Location: /home.php');
		$conn = pg_connect("dbname=db_3836 user=d33836 host=192.168.109.210");
        exit;
    }
}
function require_logined_session()
{
    // �Z�b�V�����J�n
    @session_start();
    // ���O�C�����Ă��Ȃ���� /login.php �ɑJ��
    if (!isset($_SESSION['username'])&&isset($_SESSION['id'])) {
        header('Location: /login.php');
        exit;
    }
}

/**
 * CSRF�g�[�N���̐���
 *
 * @return string �g�[�N��
 */
function generate_token()
{
    // �Z�b�V����ID����n�b�V���𐶐�
    return hash('sha256', session_id());
}

/**
 * CSRF�g�[�N���̌���
 *
 * @param string $token
 * @return bool ���،���
 */
function validate_token($token)
{
    // ���M����Ă���$token��������Ő��������n�b�V���ƈ�v���邩����
    return $token === generate_token();
}

/**
 * htmlspecialchars�̃��b�p�[�֐�
 *
 * @param string $str
 * @return string
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
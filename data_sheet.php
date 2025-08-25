<?php require_once('data_sheet_logic.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>قاعدة بيانات العقارات</title>
</head>

<body>
<p><a href="./view_all.php"><strong>رجوع</strong></a> | <img src="./print.jpg" alt="Print this page" width="74" height="61" onclick="window.print() " /></p>
<table width="60%" border="0">
  <tbody>
    <tr>
      <td><strong>لأخذ نسخة احتياطية اعمل نسخ للبيانات ثم قم بالصاقها فى ملف اكسيل او وورد حسب ما تريد</strong></td>
    </tr>
  </tbody>
</table>
<hr>
<table border="1" align="center" bordercolor="#0066FF" cellpadding="0" cellspacing="0" >
  <tr>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>ملاحظات</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
    <td align="center" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>مكتب مصدر</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>تنبيه</strong></td>
    
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>مميز؟</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>تعديل بواسطة</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>الاتجاه</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>View</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>سعر المتر</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>المتبقى</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>مدة الايجار</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>الدور</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>قسط شهرى</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>قسط سنوى</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>مدة التقسيط</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>المدفوع</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>الأوفر</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>المطلوب</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>اجمالى العقد</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>العنوان</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>تاريخ التعديل</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>تاريخ الادخال</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>تاريخ الدخول</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>مدخل البيانات</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>المتابعة</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>المصدر</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>ايميل</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>واتساب</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>موبايل</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>تليفون</strong></td>
    <td colspan="2" align="center" valign="middle" bgcolor="#CCCCCC"><strong>اسم العميل</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>العنوان</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>استلام</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>حجز</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>الوديعة</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>النادى</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>الحديقة</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>التفاصيل</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>كماليات</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>عدد الحمامات</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>عدد الغرف</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>مساحة المبانى</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>مساحة الارض</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>و</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>ع</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>ج</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>المرحلة</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>الحالة</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>التشطيب</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>نوع العملية</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>النموذج</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>نوع العقار</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>المدينة</strong></td>
    <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>الكود</strong></td>
  </tr>
  <?php foreach ($Recordset1 as $row_Recordset1) { ?>
    <tr>
      <td align="center" valign="middle"><?php echo $row_Recordset1['notes']; ?></td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['office_id']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['remember']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['momz']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['updater']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['ways']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['view_v']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['meterprice']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['motabaqi']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['modah_ejar']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['door']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['kest_month']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['kest_year']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['kest_modah']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['madfoo']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['alover']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['matloob']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['aqd_total']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['address']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['update_date']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['entry_date']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['log_date']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['modkhel']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['motabaa']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['masdr']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['email']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['whatsapp']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['mobile']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['telephone']; ?></td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['cust_title']; ?><?php echo $row_Recordset1['cust_name']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['address']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['estlam']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['hagz']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['wadyaa']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['nady']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['hadeka']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['details']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['kmalyat']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['WC']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['rooms']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['mbna_mesaha']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['ard_mesaha']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['wow']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['ain']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['geem']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['marhala']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['status']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['tashteeb']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['amalya_type']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['namozg']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['aqar_type']; ?><?php echo $row_Recordset1['aqar_type_other']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['madena']; ?><?php echo $row_Recordset1['madena_other']; ?></td>
      <td align="center" valign="middle"><?php echo $row_Recordset1['code']; ?></td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
    <?php } ?>
</table>
<h2><strong><em>لأخذ نسخة احتياطية اعمل نسخ للبيانات ثم قم بالصاقها فى ملف اكسيل او وورد حسب ما تريد</em></strong></h2>
</body>
</html>

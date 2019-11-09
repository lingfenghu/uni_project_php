lay('#version').html('-v'+ laydate.v);
//执行一个laydate实例
laydate.render({
    elem: '#form1_calendar', //指定元素
    min:0,
});
laydate.render({
    elem: '#form2_calendar', //指定元素
    min:-1,
    max:7
});
laydate.render({
    elem: '#form3_calendar', //指定元素
    min:-1,
    max:7
});
laydate.render({
    elem: '#form_calendar', //指定元素
    min: 0
});
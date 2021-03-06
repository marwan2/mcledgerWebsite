<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public static $faqs_arr = [
    ["qa"=>"What package is right for my business?", 
    "ans"=>"We have three customized packages to suit the needs of small businesses. If you are unsure, we provide free consultation for our packages and give you the best accounting solution for your business depending on your requirements. <br>
      Just give us a call on +971 56 522 4041 or +971 4 342 5577 or email us at <a href='mailto:info@mcledger.co'>info@mcledger.co</a> for more information."],
    
    ["qa"=>"What package is recommended as per the Federal Tax Authority?", 
    "ans"=>"Experts recommend our Standard Bookkeeping Package as it is well designed to ensure we meet the FTA's standard. We keep our clients informed and audit-ready to avoid hefty fines and surprise audit checks."],
    
    ["qa"=>"Can I cancel at any time?", 
    "ans"=>"Yes, absolutely. You can inform us 2 weeks in advance and we will begin the cancellation process along with your refund for the period that you will not be availing our services."],
    ["qa"=>"Can I change my package?", 
    "ans"=>"Yes, you can upgrade or downgrade your package at any given time on the application or inform us a month in advance to prepare all the formalities beforehand of smooth process of package shift."],

    ["qa"=>"Who will be working on my entries?", 
    "ans"=>"We have a perfect blend of AI and Human Intelligence to work on your entries. When you upload your invoices, it read by the OCR, from where they are taken care by a well-crafted ecosystem that consists of professionals doing data entry, accounting, reviewing, and checking. This ensures that your transactions are processed accurately, avoiding any error. "],

    ["qa"=>"Do I pay extra for additional documents?", 
    "ans"=>"Our packages include up to 150 documents limit monthly. Additional documents process cost will calculated and added as pending payment."],

    ["qa"=>"What is the difference between McLedger and other accounting software?", 
    "ans"=>"McLedger is not accounting software that provides the tools for you to manage your accounting. Unlike others, with McLedger, you will not need to hire an accountant or pay extra for any software. We do the accounting for you with a team of industry expert accountants through to a mobile and web application. You will always have human support and an app to access your up-to-date financials."],

    ["qa"=>"Does McLedger sync with other accounting software?", 
    "ans"=>"When you sign up with McLedger, we ensure that we take accounting from your hands completely. You will not need any other accounting software to work on at all."],

    ["qa"=>"How does accounting help my business?", 
    "ans"=>"Businesses require accurate financial data to make intelligent decisions. McLedger can produce this information and present various reports that can help you fulfill your tax obligations, contribute to your legal requirements, provide consultation to adjust the pricing and help you avail bank facilities along with better financial management."],

    ["qa"=>"Does McLedger file my taxes?", 
    "ans"=>"From registering for your VAT on FTA portal to filing your tax, McLedger ensures you are fully covered. You will receive a VAT report from our end where we will ask you to confirm the amount and as soon as you give us a go-ahead, we will file for you."],

    ["qa"=>"Do you offer tax or financial advice?", 
    "ans"=>"Absolutely! Our ultimate goal is to make you decision-ready when it comes to finances in your business. Our team consists of industry experts with all the requirements that qualify them to analyze and advice on tax and finance-related matters."],

    ["qa"=>"I don’t have a proper accounting system and my business is operational. Can you help me update my accounts for past months as well", 
    "ans"=>"Yes. No matter how far behind you are on your accounting, we will ensure everything is up to date and in order so that you are on top of things in no time."],

    ["qa"=>"Will I get a hardcopy or a softcopy of my reports?", 
    "ans"=>"You can download the softcopy anytime in Excel or PDF format.  You can also request a hardcopy if you like. One of our business consultants will further assist you in this matter."],

    ["qa"=>"What software do you use to process my accounting?", 
    "ans"=>"We use our proprietary software to process your entries. With McLedger, you will not need any other software to work – we do everything for you through the app."],

    ["qa"=>"Do you also have a web app?", 
    "ans"=>"Yes, we do! McLedger is a mobile and web-friendly application that you can access through your Android or iOS phone as well as a desktop browser."],

    ["qa"=>"How do you receive my documents?", 
    "ans"=>"Once you register with us, the on-boarding process will begin where our expert accountant will visit you and ensure all the formalities are completed. After this, you will only be required to take photos of your invoices, bills, receipts or any contractual document and we will process all the data for you through them."],

    ["qa"=>"Who are the accountants you hire?", 
    "ans"=>"We have a department dedicated to hire industry expert accountants through a scrutinized process to ensure that your data is in safe and professional hands."],

    ["qa"=>"Do you provide Revenue Management System?", 
    "ans"=>"Absolutely. It is included in the Standard Bookkeeping Package. You can also subscribe to our Revenue Management System package if you wish to avail it separately.   "],

    ["qa"=>"Can I communicate with my accountant directly?", 
    "ans"=>"Yes, if you want to. Go to the 'request' tab on the application. Select the entry you have concern about. Click on the bubble on the image that you want to discuss and start communicating. Our accountants are working 24/7 on your transactions and will be happy to assist you in any matter. "],

    ["qa"=>"What if I make a mistake in a transaction? Can it be changed?", 
    "ans"=>"To make any changes, all you have to do is send request on that particular document through the application. "],

    ["qa"=>"How do I sign up with McLedger?", 
    "ans"=>"You can sign up on our application by downloading it. You can also give us a call or email us. "],

    ["qa"=>"What are the payment options?", 
    "ans"=>"You can pay by cash or cheque. You can also do bank transfer or online payments. We have kept all options open for your convenience. Simply give us a call and we will guide you. "],

    ["qa"=>"How can I get in touch with you?", 
    "ans"=>"You can contact us through the following:
        <ul>
          <li>Call on +971 56 522 4041 or +971 4 342 5577</li>
          <li>Email us at <a mailto='info@mcledger.co'>info@mcledger.co</a></li>
          <li>Message us on our website</li>
          <li>Fill out the contact us form on the website - <a href='https://mcledger.co/contact-us'>https://mcledger.co/contact-us</a></li>
          <li>Message us on McLedger application</li>
        </ul>
    "]];
}

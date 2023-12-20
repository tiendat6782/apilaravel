import { ChevronLeft } from "lucide-react";
import Link from "next/link";
import React from "react";
import { Separator } from "../ui/separator";

const PaymentPrice = () => {
  return (
    <div className="flex_between p-3">
      <Link href="/products" className="flex_start">
        <ChevronLeft />
        <p className="text-sm font-semibold">Tiếp tục mua hàng</p>
      </Link>

      <div className="flex flex-col gap-2">
        <div className="flex_between">
          Tổng tiền hàng:{" "}
          <span className="text_primary ml-10 font-semibold">999.999 VNĐ</span>
        </div>
        <div className="flex_between">
          Phí ship:
          <span className="text_primary ml-10 font-semibold">999.999 VNĐ</span>
        </div>
        <Separator className="my-5" />
        <div className="flex_between">
          Tổng tiền hàng:{" "}
          <span className="text_primary ml-10 font-semibold">999.999 VNĐ</span>
        </div>
      </div>
    </div>
  );
};

export default PaymentPrice;

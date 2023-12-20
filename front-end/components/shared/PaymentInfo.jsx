"use client";
import React from "react";
import { Label } from "@/components/ui/label";
import { RadioGroup, RadioGroupItem } from "@/components/ui/radio-group";
import Image from "next/image";
import { Button } from "../ui/button";
import { Clipboard } from "lucide-react";
import { useToast } from "../ui/use-toast";

const PaymentInfo = () => {
  const { toast } = useToast();
  return (
    <div className="background_secondary p-3">
      <p className="text-lg font-semibold">Thông tin thanh toán</p>
      <div className="mt-5 flex flex-col gap-10">
        <div>
          <p className="text-sm">Phương thức thanh toán</p>
          <RadioGroup defaultValue="option-two" className="mt-3">
            <div className="flex items-center space-x-2">
              <RadioGroupItem value="option-one" id="option-one" disabled />
              <Label htmlFor="option-one" disabled>
                Thẻ tín dụng
              </Label>
            </div>
            <div className="flex items-center space-x-2">
              <RadioGroupItem value="option-two" id="option-two" />
              <Label htmlFor="option-two">Chuyển khoản ngân hàng</Label>
            </div>
          </RadioGroup>
        </div>
        <div>
          <Image
            src="/assets/logos/mb-logo.svg"
            width={200}
            height={200}
            className="h-10 w-10"
            alt="mb bank"
          />
          <p className="text-sm">
            Chủ tài khoản:{" "}
            <span className="text_primary font-semibold">Le Quoc Phai</span>
          </p>
          <div className="flex_start">
            <p className="text-sm">
              Số tài khoản:{" "}
              <span className="text_primary font-semibold">0375616574</span>
            </p>
            <Button
              onClick={() => {
                navigator.clipboard.writeText("0375616574");
                toast({
                  title: "Đã copy số tài khoản",
                  status: "success",
                });
              }}
              variant="icon"
              size="xs"
              className="background_primary"
            >
              <Clipboard className="w-4" />
            </Button>
          </div>
          <p className="text-sm">
            Nội dung \ :{" "}
            <span className="text_primary font-semibold">Le Quoc Phai</span>
          </p>
        </div>
      </div>
    </div>
  );
};

export default PaymentInfo;

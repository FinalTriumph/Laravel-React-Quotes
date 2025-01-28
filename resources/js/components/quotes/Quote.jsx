import React from 'react';

export default function Quote({ quote }) {
    if (!quote) {
        return (null);
    }

    return (
        <div className="flex flex-col max-w-sm bg-slate-100 text-slate-800 p-6 m-2 rounded-md">
            <p className="font-bold">{quote.quote}</p>
            <p className="mb-4">- {quote.author}</p>
            <div className="flex mt-auto text-sm text-slate-600">
                <p className="mr-auto">{quote.savedBy}</p>
                <p>{quote.savedAt}</p>
            </div>
        </div>
    );
}